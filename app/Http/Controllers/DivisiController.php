<?php

namespace App\Http\Controllers;

use App\Models\divisi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisi = divisi::all();
        return view('admin.divisi.index', ['data' => $divisi]);
    }

    public function store(Request $request)
    {
        $divisi = new divisi([
            'divisi' => $request->divisi
        ]);
        $divisi->save();
        return redirect()->route('data.divisi')->with('message', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        $divisi = divisi::find($request->id)->update([
            'divisi' => $request->divisi,
        ]);
        return redirect()->route('data.divisi')->with('message', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {

        $divisi = divisi::find($id)->delete();

        return redirect()->route('data.divisi')->with('message', 'Data Berhasil Dihapus');
    }

    public function print()
    {
        $divisi = divisi::all();
        $data = [
            'divisi' => $divisi,
            'date' => date("d-M-Y"),
        ];
        $pdf = Pdf::loadView('admin.divisi.print', $data);
        return $pdf->download('divisi.pdf');
    }
}
