<?php

namespace App\Http\Controllers;

use App\Models\Opsi;
use App\Models\subKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $subKriteria = subKriteria::all();
        $opsi = Opsi::all();
        $data = [
            'subKriteria' => $subKriteria,
            'opsi' => $opsi
        ];

        return view('admin.subKriteria.index', $data);
    }

    public function destroy($id)
    {
        subKriteria::find($id)->delete();
        return redirect()->route('data.subKriteria')->with('message', 'Data Berhasil Di Hapus');
    }

    public function addOpsi(Request $request)
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
        return redirect()->route('data.subKriteria')->with('message', 'Berhasil Update');
    }
}
