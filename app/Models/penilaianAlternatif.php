<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaianAlternatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelamar_id',
        'kriteria_id',
        'nilai'
    ];

    public function pelamars()
    {
        return $this->belongsTo(pelamar::class, 'pelamar_id');
    }
    public function kriterias()
    {
        return $this->belongsTo(kriteria::class, 'kriteria_id');
    }
}
