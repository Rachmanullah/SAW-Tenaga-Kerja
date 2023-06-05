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
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'cv' => 'mimes:pdf|max:2048'
        ]);
        if ($request->file('cv')) {
            $cv = time() . '-' . $request->file('cv')->getClientOriginalName();
            $request->file('cv')->move('assets/file', $cv);
        } else {
            $cv = '';
        }
        $pelamar = new pelamar([
            'name' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jk,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'cv' => $cv
        ]);
        $pelamar->save();

        $pendaftaran = new pendaftaran([
            'pelamar_id' => $pelamar->id,
            'lowongan_id' => $request->lowongan_id,
            'status' => 'Seleksi'
        ]);
        $pendaftaran->save();

        $bobotLowker = bobotLowker::where('lowongan_id', $request->lowongan_id)->get();
        foreach ($bobotLowker as $bobotLowkers) {
            $penilaian = new penilaianAlternatif([
                'pelamar_id' => $pelamar->id,
                'lowongan_id' => $request->lowongan_id,
                'kriteria_id' => $bobotLowkers->kriterias->id,
                'nilai' => 0,
            ]);
            $penilaian->save();
        }

        // $jmlkuota = lowongan::find($request->lowongan_id);
        // // $jmlkuota->kuota = $jmlkuota->kuota - 1;
        // $jmlkuota->save();
        return redirect()->route('lowongan')->with('message', 'Anda telah berhasil mendaftar, tunggu Pengumuman pada website kami');
    }

    public function pengumuman($id){
       $pendaftar = pendaftaran::where('lowongan_id', $id)->with('pelamars')->get();
    //    dd($pendaftar);
       return view('lowker.pengumuman', compact('pendaftar'));
    }
}
