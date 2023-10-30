<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getDayAttribute() {
        $days = ['Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => "Jum'at", 'Sat' => 'Sabtu'];
        return $days[date('D', strtotime($this->date))];
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

    public function getPhotoUrlAttribute() {
        return asset('storage/'.$this->photo);
    }

}
