<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasilSaw extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelamar_id',
        'hasil',
    ];

    public function pelamars(){
        return $this->belongsTo(pelamar::class, 'pelamar_id');
    }
}
