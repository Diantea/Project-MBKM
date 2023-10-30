<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function students() {
        return $this->belongsToMany(User::class, 'lecturer_students', 'lecturer_id', 'student_id', 'id');
    }

    public function lecturer() {
        return $this->hasOne(LecturerStudent::class, 'student_id', 'id');
    }

    public function internships() {
        return $this->hasMany(Internship::class, 'student_id', 'id');
    }

    public function schedules() {
        return $this->hasMany(Schedule::class, 'lecturer_id ', 'id');
    }

    public function daily_reports() {
        return $this->hasMany(DailyReport::class, 'student_id', 'id');
    }

    public function getPhotoUrlAttribute() {
        if (!$this->photo) return false;
        return asset('storage/'.$this->photo);
    }

    public function getInitialAttribute() {
        return collect(explode(' ', $this->name))->map(function($name, $index) {
            return $index < 2 ? $name[0] : '';
        })->join('');
    }

    public function getOnInternshipAttribute() {
        return $this->internships()->whereNotIn('status', ['rejected'])->first();
    }

    public function last_reports() {
        return $this->hasMany(LastReport::class, 'student_id', 'id');
    }

    public function scores()
    {
        return $this->hasMany(Score::class, 'student_id', 'id');
    }

    public function getTotalScoreAttribute() {
        if ($this->scores->count() === 0) return false;
        $total = $this->scores->reduce(function($total, $score) {
            $total += $score->score;
            return $total;
        }, 0) / count($this->scores);
        return $total;
    }
}
