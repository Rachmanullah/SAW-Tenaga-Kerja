<?php

namespace App\Http\Controllers;

use App\Models\bobotLowker;
use App\Models\kriteria;
use App\Models\lowongan;
use App\Models\Opsi;
use App\Models\pelamar;
use App\Models\pendaftaran;
use App\Models\penilaianAlternatif;
use App\Models\subKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DaftarController extends Controller
{
    public function daftar($id)
    {
        //$lowongan = lowongan::find($id);
        $bobotLowker = bobotLowker::where('lowongan_id', $id)->get();
        $kriteria = kriteria::all();
        $subKriteria = subKriteria::all();
        $opsi = Opsi::all();
        $array = [
            'lowongan_id' => $id,
            'bobotLowker' => $bobotLowker,
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
            'opsi' => $opsi,
        ];
        return view('daftar', $array);
    }

    public function store(Request $request)
    {
        $pelamar = new pelamar([
            'name' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jk,
            'agama' => $request->agama,
            'pendidikan_akhir' => $request->pendidikan_akhir,
            'alamat' => $request->alamat,
        ]);
        $pelamar->save();

        $pendaftaran = new pendaftaran([
            'pelamar_id' => $pelamar->id,
            'lowongan_id' => $request->lowongan_id,
        ]);
        $pendaftaran->save();

        $bobotLowker = bobotLowker::where('lowongan_id', $request->lowongan_id)->get();
        foreach ($bobotLowker as $bobotLowkers) {
            if ($bobotLowkers->kriterias->subKriterias->count() > 0) {
                $nilai = 0;
                foreach ($bobotLowkers->kriterias->subKriterias as $subKriterias) {
                    $nilai += ($subKriterias->nilai_sub_kriteria / 100) * $request->sub_kriteria[$subKriterias->id];
                }
                $penilaian = new penilaianAlternatif([
                    'pelamar_id' => $pelamar->id,
                    'kriteria_id' => $bobotLowkers->kriterias->id,
                    'nilai' => $nilai,
                ]);
                $penilaian->save();
            } else {
                $penilaian = new penilaianAlternatif([
                    'pelamar_id' => $pelamar->id,
                    'kriteria_id' => $bobotLowkers->kriterias->id,
                    'nilai' => $request->data[str_replace(' ', '_', $bobotLowkers->kriterias->kriteria)],
                ]);
                $penilaian->save();
            }
        }
        $jmlkuota = lowongan::find($request->lowongan_id);
        $jmlkuota->kuota = $jmlkuota->kuota - 1;
        $jmlkuota->save();
        return redirect()->route('lowongan')->with('message', 'Anda telah berhasil mendaftar, tunggu panggilan anda melalui email');
    }
}
