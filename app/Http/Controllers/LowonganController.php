<?php

namespace App\Http\Controllers;

use App\Models\bobotLowker;
use App\Models\divisi;
use App\Models\kriteria;
use App\Models\lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowker = lowongan::all();
        $divisi = divisi::all();
        $kriteria = kriteria::all();
        $bobotLowker = bobotLowker::all();
        $data = [
            'lowongan' => $lowker,
            'divisi' => $divisi,
            'kriteria' => $kriteria,
            'bobotLowker' => $bobotLowker
        ];
        return view('admin.lowongan.index', $data);
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
        // dd($request);
        $data = new lowongan([
            'tgl_dimulai' => $request->tgl_dimulai,
            'tgl_ditutup' => $request->tgl_ditutup,
            'kuota' => $request->kuota,
            'divisi_id' => $request->divisi_id,
            'status' => $request->status,
        ]);
        $data->save();

        $jml = count($request->kriteria_id);

        for ($i = 0; $i < $jml; $i++) {
            $bobotLowker = new bobotLowker();
            $bobotLowker->lowongan_id = $data->id;
            $bobotLowker->kriteria_id = $request->kriteria_id[$i];
            $bobotLowker->save();
        }
        return redirect()->route('data.lowongan')->with('message', 'Berhasil Ditambahkan');
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
        // dd($request);
        lowongan::find($request->id)->update([
            'tgl_dimulai' => $request->tgl_dimulai,
            'tgl_ditutup' => $request->tgl_ditutup,
            'kuota' => $request->kuota,
            'divisi_id' => $request->divisi_id,
            'status' => $request->status,
        ]);
        $jml = count($request->id_bobotLowkers);
        for ($i = 0; $i < $jml; $i++) {
            bobotLowker::find($request->id_bobotLowkers[$i])->update([
                'kriteria_id' => $request->kriteria_id[$i],
            ]);
        }
        return redirect()->route('data.lowongan')->with('message', 'Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = lowongan::find($id)->delete();

        return redirect()->route('data.lowongan')->with('message', 'Berhasil Dihapus');
    }

    public function tampilkan()
    {
        $lowker = lowongan::all();
        $bobotLowker = bobotLowker::all();
        $data = [
            'lowongan' => $lowker,
            'bobotLowker' => $bobotLowker
        ];

        return view('lowker.index', $data);
    }
}
