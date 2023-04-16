<?php

namespace App\Http\Controllers;

use App\Models\bobotLowker;
use App\Models\kriteria;
use App\Models\lowongan;
use App\Models\Opsi;
use App\Models\subKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DaftarController extends Controller
{
    public function daftar($id)
    {
        
        return view('daftar');
    }

    public function store(Request $request)
    {
        
        dd($request);
    }
}
