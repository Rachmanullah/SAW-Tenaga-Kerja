<?php

namespace App\Http\Controllers;

use App\Models\pelamar;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index()
    {
        $pelamar = pelamar::all();

        return view('admin.pelamar.index',['data'=>$pelamar]);
    }
}
