<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastReportFile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getFileUrlAttribute() {
        return asset('storage/'.$this->file);
    }
}
