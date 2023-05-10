<?php

namespace App\Http\Controllers;

use App\Models\Opsi;
use Illuminate\Http\Request;

class OpsiController extends Controller
{
    public function store(Request $request)
    {
        $count = count($request->opsi);
        for ($i = 0; $i < $count; $i++) {
            $opsi = new Opsi([
                'sub_kriteria_id' => $request->id,
                'opsi' => $request->opsi[$i],
                'nilai_opsi' => $request->nilai_opsi[$i],
            ]);
            $opsi->save();
        }
        return redirect()->route('data.subKriteria')->with('message', 'Berhasil Tambah Opsi');
    }

    public function destroy($id)
    {
        Opsi::find($id)->delete();
        return redirect()->route('data.subKriteria')->with('message', 'Berhasil Hapus Opsi');
    }
}
