<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaianAlternatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelamar_id',
        'lowongan_id',
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
    public function lowongans()
    {
        return $this->belongsTo(lowongan::class, 'lowongan_id');
    }

    public function normalisasi($id)
    {
        $data = [];
        $bobot = bobotLowker::where('lowongan_id', $id)->get();

        foreach ($bobot as $bobots) {
            if ($this->kriteria_id == $bobots->kriteria_id) {
                $max = penilaianAlternatif::where('kriteria_id', $this->kriteria_id)
                    ->where('lowongan_id', $id)
                    ->max('nilai');

                $data[] = [
                    'id' => $this->pelamar_id,
                    'name' => $this->pelamars->name,
                    'nilai_alternatif' => $this->nilai,
                    'kriteria_id' => $this->kriteria_id,
                    'nilai_max' => $max,
                    'bobot_kriteria' => $this->kriterias->bobot,
                    'hasil_normalisasi' => round($this->nilai / $max, 2),
                    'hasil_saw' => $this->kriterias->bobot * round($this->nilai / $max, 2)
                ];
            }
        }
        return $data;
    }
}
