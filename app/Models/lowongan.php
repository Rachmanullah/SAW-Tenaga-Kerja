<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_dimulai',
        'tgl_ditutup',
        'kuota',
        'status',
        'divisi_id'
    ];
    public function divisis()
    {
        return $this->belongsTo(divisi::class, 'divisi_id');
    }
    public function bobotLowker()
    {
        return $this->belongsTo(bobotLowker::class, 'id');
    }
    public function pendaftarans()
    {
        return $this->hasMany(pendaftaran::class);
    }
}
