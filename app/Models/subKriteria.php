<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subKriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'kriteria_id',
        'sub_kriteria',
        'nilai_sub_kriteria',
    ];
    public function kriterias()
    {
        return $this->belongsTo(kriteria::class, 'kriteria_id');
    }
    public function opsis()
    {
        return $this->hasMany(Opsi::class, 'id');
    }
}
