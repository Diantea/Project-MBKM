<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getDateDisplayAttribute() {
        return date('j M Y', strtotime($this->date));
    }

    public function getPhotoUrlAttribute() {
        return asset('storage/'.$this->photo);
    }
}
