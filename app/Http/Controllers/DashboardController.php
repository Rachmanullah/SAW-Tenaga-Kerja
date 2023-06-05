<?php

namespace App\Http\Controllers;

use App\Models\lowongan;
use App\Models\pelamar;
use App\Models\pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;

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
