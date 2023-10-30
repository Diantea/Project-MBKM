<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function student() {
        return $this->belongsTo(User::class);
    }

    public function getStatusDisplayAttribute() {
        switch ($this->status) {
            case 'accepted':
                return '<span class="badge rounded-pill bg-label-success">Diterima</span>';
            case 'rejected':
                return '<span class="badge rounded-pill bg-label-danger">Ditolak</span>';
            case 'processed':
                return '<span class="badge rounded-pill bg-label-warning">Diproses</span>';
            case 'signed':
                return '<span class="badge rounded-pill bg-label-info">Ditanda tangani</span>';
            default:
                return '<span class="badge rounded-pill bg-label-secondary">Pending</span>';
        }
    }

    public function getMouUrlAttribute() {
        if (!$this->mou) return false;
        return asset('storage/'.$this->mou);
    }

    public function getSignedMouUrlAttribute() {
        if (!$this->signed_mou) return false;
        return asset('storage/'.$this->signed_mou);
    }
}
