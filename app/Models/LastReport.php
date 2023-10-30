<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastReport extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getDateDisplayAttribute() {
        return date('d/m/Y', strtotime($this->date));
    }

    public function files() {
        return $this->hasMany(LastReportFile::class, 'last_report_id', 'id');
    }

    public function getFileNamesAttribute() {
        return [
            'Laporan Akhir MBKM',
            'Powerpoint',
            'Dokumentasi pendukung photo/video',
            'Nilai Evaluasi Akhir Pembimbing Lapangan'
        ];
    }

    public function getFile1Attribute() {
        return $this->files()->where('name', $this->file_names[0])->first();
    }

    public function getFile2Attribute() {
        return $this->files()->where('name', $this->file_names[1])->first();
    }

    public function getFile3Attribute() {
        return $this->files()->where('name', $this->file_names[2])->first();
    }

    public function getFile4Attribute() {
        return $this->files()->where('name', $this->file_names[3])->first();
    }
}
