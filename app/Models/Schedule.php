<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lecturer() {
        return $this->belongsTo(User::class, 'lecturer_id', 'id');
    }

    public function getDayAttribute() {
        return date('D', strtotime($this->date));
    }

    public function getDateDisplayAttribute() {
        return date('d/m/Y', strtotime($this->date));
    }

    public function getStartDisplayAttribute() {
        return date('H:i', strtotime($this->start));
    }

    public function getEndDisplayAttribute() {
        return date('H:i', strtotime($this->end));
    }

    public function getDurationAttribute() {
        $start = date_create($this->start);
        $end = date_create($this->end);
        $diff = date_diff($start, $end);


        return ($diff->h > 0 ? $diff->h . ' jam ' : '') . ($diff->i > 0 ? $diff->i . ' menit' : '');
    }
}
