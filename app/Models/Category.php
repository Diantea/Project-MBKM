<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function getStudentsAttribute() {
        return $this->users()->where('role', 'student')->where('status', 'active')->get();
    }

    public function getLecturersAttribute() {
        return $this->users()->where('role', 'lecturer')->get();
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
