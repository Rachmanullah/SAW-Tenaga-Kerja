<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bobotLowker extends Model
{
    use HasFactory;

    protected $fillable = [
        'lowongan_id',
        'kriteria_id',
    ];

    public function lowongans()
    {
        return $this->belongsTo(lowongan::class, 'lowongan_id');
    }
    public function kriterias()
    {
        return $this->belongsTo(kriteria::class, 'kriteria_id');
    }
}
