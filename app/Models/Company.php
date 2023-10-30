<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function internships() {
        return $this->hasMany(Internship::class);
    }

    public function student() {
        return $this->hasOne(User::class);
    }

    public function getFile1UrlAttribute() {
        return asset('storage/'.$this->file_1);
    }

    public function getFile1TypeAttribute() {
        return 'pdf';
    }

    public function getFile2UrlAttribute() {
        return asset('storage/'.$this->file_2);
    }

    public function getFile2TypeAttribute() {
        return 'pdf';
    }
}
