<?php

namespace App\Http\Controllers;

use App\Models\lowongan;
use App\Models\pelamar;
use App\Models\pendaftaran;
use App\Models\penilaianAlternatif;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $lowker = lowongan::all();
        return view('admin.hasilSAW.index', ['lowker' => $lowker]);
    }

    //melihat data penilaian tiap lowongan
    public function view($id)
    {
        $lowker = lowongan::find($id);
        $pelamar = pelamar::all();
        $pendaftaran = pendaftaran::where('lowongan_id', $id)->get();
        $penilaian = penilaianAlternatif::all();

        $array = [
            'lowker' => $lowker,
            'pelamar' => $pelamar,
            'pendaftaran' => $pendaftaran,
            'penilaian' => $penilaian
        ];

        return view('admin.hasilSAW.detail', $array);
    }
}
