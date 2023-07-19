<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tmp_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'umur',
        'agama',
        'alamat',
        'email',
        'no_telp',
        'cv'
    ];

    public function pendaftarans()
    {
        return $this->hasOne(pendaftaran::class);
    }

    public function penilaians()
    {
        return $this->hasMany(penilaianAlternatif::class);
    }
    public function hasil_saws(){
        return $this->hasOne(hasilSaw::class);
    }
}
