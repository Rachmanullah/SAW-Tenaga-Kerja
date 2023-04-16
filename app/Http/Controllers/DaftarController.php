<?php

namespace App\Http\Controllers;

use App\Models\bobotLowker;
use App\Models\kriteria;
use App\Models\lowongan;
use App\Models\Opsi;
use App\Models\pelamar;
use App\Models\pendaftaran;
use App\Models\subKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DaftarController extends Controller
{
    public function daftar($id)
    {
        return view('daftar', ['lowongan_id' => $id]);
    }

    public function store(Request $request)
    {
        // dd($request);
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

        return redirect()->route('lowongan')->with('message', 'Anda telah berhasil mendaftar, tunggu panggilan anda melalui email');
    }
}
