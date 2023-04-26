<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelamar extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'tmp_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'umur',
        'agama',
        'alamat',
        'pendidikan_terakhir',
        'email',
        'no_telp',
    ];

    public function pendaftarans(){
        return $this->hasOne(pendaftaran::class);
    }

    public function penilaians(){
        return $this->hasMany(penilaianAlternatif::class);
    }
}
