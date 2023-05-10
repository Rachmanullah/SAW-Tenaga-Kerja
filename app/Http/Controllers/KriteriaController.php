<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\subKriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = kriteria::all();
        $sub_kriteria = subKriteria::all();
        $data = [
            'kriteria' => $kriteria,
            'sub_kriteria' => $sub_kriteria
        ];
        return view('admin.kriteria.index', $data);
    }

    public function store(Request $request)
    {
        $kriteria = new kriteria([
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
            'kategori' => $request->kategori,
        ]);
        $kriteria->save();

        if ($request->sub_kriteria) {
            $jml = count($request->sub_kriteria);
            for ($i = 0; $i < $jml; $i++) {
                $sub_kriteria = new subKriteria([
                    'kriteria_id' => $kriteria->id,
                    'sub_kriteria' => $request->sub_kriteria[$i],
                    'nilai_sub_kriteria' => $request->nilai_sub_kriteria[$i],
                ]);
                $sub_kriteria->save();
            }
        }
        return redirect()->route('data.kriteria')->with('message', 'Berhasil Tambah Data');
    }

    public function update(Request $request)
    {
        kriteria::find($request->id)->update([
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
            'kategori' => $request->kategori,
        ]);

        if ($request->id_sub_kriterias) {
            $jml = count($request->id_sub_kriterias);
            for ($i = 0; $i < $jml; $i++) {
                subKriteria::find($request->id_sub_kriterias[$i])->update([
                    'sub_kriteria' => $request->sub_kriteria[$i],
                    'nilai_sub_kriteria' => $request->nilai_sub_kriteria[$i],
                ]);
            }
        }

        return redirect()->route('data.kriteria')->with('message', 'Berhasil Update Data');
    }

    public function destroy($id)
    {
        kriteria::find($id)->delete();

        return redirect()->route('data.kriteria')->with('message', 'Berhasil Hapus Data');
    }
}
