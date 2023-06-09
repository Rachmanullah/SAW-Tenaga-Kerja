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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $divisi = new divisi([
            'divisi' => $request->divisi
        ]);
        $divisi->save();
        return redirect()->route('data.divisi')->with('message', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $divisi = divisi::find($request->id)->update([
            'divisi' => $request->divisi,
        ]);
        return redirect()->route('data.divisi')->with('message', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
