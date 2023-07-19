<?php

namespace App\Http\Controllers;

use App\Models\lowongan;
use App\Models\pelamar;
use App\Models\pendaftaran;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $Pelamar = pelamar::all()->count();
        $lowongan = lowongan::all()->count();
        $pendaftar = pendaftaran::where('status', 'Terima')->count();
        $rekap = lowongan::with('pendaftarans', 'penilaians')->get();

        $data = [
            'countPelamar' => $Pelamar,
            'countLowongan' => $lowongan,
            'jmlDiterima' => $pendaftar,
            'rekap' => $rekap
        ];

        return view('admin.dashboard', $data);
    }
}
