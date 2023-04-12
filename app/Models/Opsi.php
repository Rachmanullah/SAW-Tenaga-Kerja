<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_kriteria_id',
        'opsi',
        'nilai_opsi',
    ];
    public function subKriterias()
    {
        return $this->belongsTo(subKriteria::class, 'sub_kriteria_id');
    }
}
