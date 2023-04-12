<?php

namespace App\Http\Controllers;

use App\Models\lowongan;
use App\Models\pelamar;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $Pelamar = pelamar::all()->count();
        $lowongan = lowongan::all()->count();

        $data = [
            'countPelamar' => $Pelamar,
            'countLowongan' => $lowongan,
        ];

        return view('admin.dashboard', $data);
    }
}
