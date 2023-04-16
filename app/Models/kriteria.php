<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria',
        'bobot',
    ];

    public function bobotLowker()
    {
        return $this->hasMany(bobotLowker::class, 'id');
    }

    public function subKriterias()
    {
        return $this->hasMany(subKriteria::class);
    }
}
