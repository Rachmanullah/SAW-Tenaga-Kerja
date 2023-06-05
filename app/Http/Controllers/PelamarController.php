<?php

namespace App\Http\Controllers;

use App\Models\lowongan;
use App\Models\pelamar;
use App\Models\pendaftaran;
use App\Models\penilaianAlternatif;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index()
    {
        $pelamar = pelamar::all();
        $lowker = lowongan::all();
        $array = [
            'data' => $pelamar,
            'lowker' => $lowker,
        ];

        return view('admin.pelamar.index', $array);
    }

    public function print(Request $request)
    {
        $pendaftar = pendaftaran::where('lowongan_id', $request->lowongan_id)->get();
        foreach ($pendaftar as $key) {
            $divisi = $key->lowongans->divisis->divisi;
            $lowker = $key->lowongans->lowongan_kerja;
        }

        $data = [
            'divisi' => $divisi,
            'date' => date("d-M-Y"),
            'data' => $pendaftar,
            'lowker' => $lowker,
        ];
        $pdf = Pdf::loadView('admin.pelamar.print', $data);
        return $pdf->download('pelamar.pdf');
    }

    public function search(Request $request)
    {
        $pelamar = pelamar::where('name', 'like', '%' . $request->search . '%')->get();
        $lowker = lowongan::all();
        $array = [
            'data' => $pelamar,
            'lowker' => $lowker,
        ];

        return view('admin.pelamar.index', $array);
    }

    public function destroy($id)
    {
        penilaianAlternatif::where('pelamar_id', $id)->delete();
        pendaftaran::where('pelamar_id', $id)->delete();
        pelamar::find($id)->delete();

        return redirect()->route('data.pelamar')->with('message', 'Berhasil Dihapus');
    }
}
