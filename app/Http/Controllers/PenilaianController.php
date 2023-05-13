<?php

namespace App\Http\Controllers;

use App\Models\bobotLowker;
use App\Models\hasilSaw;
use App\Models\kriteria;
use App\Models\lowongan;
use App\Models\Opsi;
use App\Models\pelamar;
use App\Models\pendaftaran;
use App\Models\penilaianAlternatif;
use App\Models\subKriteria;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $lowker = lowongan::all();
        return view('admin.penilaian.index', ['lowker' => $lowker]);
    }
    public function view($id)
    {
        $lowker = lowongan::find($id);
        $pelamar = pelamar::all();
        $pendaftaran = pendaftaran::where('lowongan_id', $id)->get();
        $penilaian = penilaianAlternatif::all();
        $subKriteria = subKriteria::all();
        $opsi = Opsi::all();
        $nilai = penilaianAlternatif::where('lowongan_id', $id)->get();
        $dataSAW = [];
        foreach ($nilai as $nilais) {
            if ($nilais) {
                foreach ($nilais->normalisasi($id) as $dt) {
                    $dataSAW[] = $dt;
                }
            }
            // else{
            //     $dataSAW[] =
            //     [
            //         'id' => '',
            //         'name' => '',
            //         'nilai_alternatif' => '',
            //         'kriteria_id' => '',
            //         'nilai_max' => '',
            //         'bobot_kriteria' => '',
            //         'hasil_normalisasi' => 0,
            //         'hasil_saw' => 0
            //     ];
            // }
        }
        if ($dataSAW) {
            foreach ($pendaftaran as $pendaftar) {
                $akhir = 0;
                foreach ($dataSAW as $key) {
                    if ($key['id'] == $pendaftar->pelamar_id) {
                        $akhir += $key['hasil_saw'];
                    }
                }
                hasilSaw::updateOrCreate(
                    ['pelamar_id' => $pendaftar->pelamar_id],
                    ['hasil' => $akhir]
                );
            }
        }
        $array = [
            'lowker' => $lowker,
            'pelamar' => $pelamar,
            'pendaftaran' => $pendaftaran,
            'penilaian' => $penilaian,
            'subKriteria' => $subKriteria,
            'opsi' => $opsi,
        ];
        // dd(['dataSAW' => $dataSAW]);
        return view('admin.penilaian.nilai', $array, ['dataSAW' => $dataSAW]);
    }
    public function inputNilai(Request $request)
    {
        $bobotLowker = bobotLowker::where('lowongan_id', $request->lowongan_id)->get();
        foreach ($bobotLowker as $bobotLowkers) {
            if ($bobotLowkers->kriterias->subKriterias->count() > 0) {
                $nilai = 0;
                foreach ($bobotLowkers->kriterias->subKriterias as $subKriterias) {
                    $nilai += ($subKriterias->nilai_sub_kriteria / 100) * $request->sub_kriteria[$subKriterias->id];
                }
                $penilaian = penilaianAlternatif::where('pelamar_id', $request->pelamar_id)
                    ->where('kriteria_id', $bobotLowkers->kriterias->id)
                    ->update(['nilai' => $nilai]);
            } else {
                $penilaian = penilaianAlternatif::where('pelamar_id', $request->pelamar_id)
                    ->where('kriteria_id', $bobotLowkers->kriterias->id)
                    ->update(['nilai' => $request->data[str_replace(' ', '_', $bobotLowkers->kriterias->kriteria)]]);
            }
        }

        return redirect()->route('penilaian.view', ['id' => $request->lowongan_id])->with('message', 'Berhasil Input Nilai');
    }

    public function test()
    {
        $nilai = penilaianAlternatif::where('lowongan_id', 1)->get();
        // $daftar = pendaftaran::where('lowongan_id', 1)->get();
        foreach ($nilai as $nilais) {
            // foreach ($daftar as $daftars) {
            // if ($daftars->pelamar_id == $nilais->pelamar_id) {
            // $data[] = $nilais->normalisasi(1);
            foreach ($nilais->normalisasi(1) as $dt) {
                // foreach ($dt as $key) {
                // var_dump($dt);
                $array[] = $dt;
                //  }
            }
            // }
            // }
        }

        $pendaftaran = pendaftaran::where('lowongan_id', 1)->get();
        foreach ($pendaftaran as $daftar) {
            $akhir = 0;
            foreach ($array as $key) {
                if ($key['id'] == $daftar->pelamar_id) {
                    $akhir += $key['hasil_saw'];
                }
            }
            var_dump($akhir);
            hasilSaw::updateOrCreate(
                ['pelamar_id' => 1],
                ['hasil' => $akhir]
            );
        }
        // dd($array);
        // foreach ($nilais->normalisasi(1) as $dt) {
        //     // foreach ($dt as $key) {
        //         var_dump($dt);
        //     // }
        // }
        // return $data;

        // $daftar = pendaftaran::where('lowongan_id', 1)->get();
        // $bobot = bobotLowker::where('lowongan_id', 1)->get();
        // $penilaian = penilaianAlternatif::all();
        // foreach ($bobot as $bobots) {
        //     foreach ($penilaian as $penilaians) {
        //         if ($penilaians->kriteria_id == $bobots->kriteria_id) {
        //             foreach ($daftar as $daftars) {
        //                 if ($daftars->pelamar_id == $penilaians->pelamar_id) {
        //                     $max = penilaianAlternatif::where('kriteria_id', $penilaians->kriteria_id)->max('nilai');
        //                     echo $daftars->name . ' nilai = ' . $penilaians->nilai . ' nilai Max = ' . $max . ' Hasil = ' . round($penilaians->nilai / $max, 2) . '<br>';
        //                 }
        //             }
        //         }
        //     }
        // }
    }
}
