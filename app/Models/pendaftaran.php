<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelamar_id',
        'lowongan_id',
    ];

    public function pelamars()
    {
        return $this->belongsTo(pelamar::class, 'pelamar_id');
    }

    public function lowongans()
    {
        return $this->belongsTo(lowongan::class, 'lowongan_id');
    }
}
