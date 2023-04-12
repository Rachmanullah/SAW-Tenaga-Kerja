<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'divisi',
    ];

    public function lowongans()
    {
        return $this->hasOne(lowongan::class, 'id');
    }
}
