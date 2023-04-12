<?php

namespace App\Http\Controllers;

use App\Models\bobotLowker;
use App\Models\kriteria;
use App\Models\lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DaftarController extends Controller
{
    public function daftar($id)
    {
        $lowongan = lowongan::find($id);
        $bobotLowker = bobotLowker::where('lowongan_id', $id)->get();
        // $kriteria = kriteria::all();
        $data = [
            'lowongan' => $lowongan,
            'bobotLowker' => $bobotLowker,
            // 'kriteria' => $kriteria,
        ];

        return view('daftar', $data);
    }

    public function store(Request $request){
        dd($request);
    }
}
