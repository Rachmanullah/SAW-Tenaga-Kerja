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
use Barryvdh\DomPDF\Facade\Pdf;
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
        $dataBaru = [];
        foreach ($nilai as $nilais) {
            if ($nilais) {
                foreach ($nilais->normalisasi($id) as $dt) {
                    $dataSAW[] = $dt;
                }
            }
        }
        // if ($dataSAW) {
        //     foreach ($pendaftaran as $pendaftar) {
        //         $akhir = 0;
        //         foreach ($dataSAW as $key) {

        //             if ($key['id'] == $pendaftar->pelamar_id) {
        //                 // Memeriksa apakah ID sudah ada dalam $dataBaru sebelum menambahkannya
        //                 $found = false;
        //                 $akhir += $key['hasil_saw'];
        //                 foreach ($dataBaru as $item) {
        //                     if ($item['pelamar_id'] == $key['id']) {
        //                         $found = true;
        //                         break;
        //                     }
        //                 }
        //                 // Jika ID belum ada dalam $dataBaru, tambahkan data baru
        //                 if (!$found) {
        //                     $dataBaru[] = [
        //                         'pelamar_id' => $key['id'],
        //                         'name' => $key['name'],
        //                         'hasil_saw' => $akhir
        //                     ];
        //                 }
        //                 if($found){
        //                     $dataBaru['hasil_saw'] = $akhir;
        //                 }
        //             }
        //         }
        //         hasilSaw::updateOrCreate(
        //             ['pelamar_id' => $pendaftar->pelamar_id],
        //             ['hasil' => $akhir]
        //         );
        //     }
        //     dd($dataBaru);
        //     die;
        // }
        if ($dataSAW) {
            foreach ($pendaftaran as $pendaftar) {
                $akhir = 0;

                foreach ($dataSAW as $key) {
                    if ($key['pelamar_id'] == $pendaftar->pelamar_id) {
                        $found = false;
                        $akhir += $key['hasil_saw'];

                        foreach ($dataBaru as &$item) {
                            if ($item['pelamar_id'] == $key['pelamar_id']) {
                                $found = true;
                                $item['hasil_saw'] = $akhir;
                                break;
                            }
                        }

                        if (!$found) {
                            $dataBaru[] = [
                                'pelamar_id' => $key['pelamar_id'],
                                'name' => $key['name'],
                                'bobot_kriteria' => $key['bobot_kriteria'],
                                'hasil_normalisasi' => $key['hasil_normalisasi'],
                                'hasil_saw' => $akhir
                            ];
                        }
                    }
                }

                usort($dataBaru, function ($a, $b) {
                    return $b['hasil_saw'] <=> $a['hasil_saw'];
                });

                $ranking = 1;
                foreach ($dataBaru as &$item) {
                    $item['ranking'] = $ranking;
                    $ranking++;
                }
                $topThree = array_slice($dataBaru, 0, $lowker->batas_diterima);
                // foreach ($topThree as $item) {
                //     echo "Peringkat: " . $item['ranking'] . "\n";
                //     echo "Nama: " . $item['name'] . "\n";
                //     // Tambahkan informasi lain yang ingin ditampilkan dalam kesimpulan
                //     echo "\n";
                // }
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
            'ranking' => $dataBaru
        ];

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

    public function print($id)
    {
        $lowker = lowongan::find($id);
        $pelamar = pelamar::all();
        $pendaftaran = pendaftaran::where('lowongan_id', $id)->get();
        $penilaian = penilaianAlternatif::all();
        $subKriteria = subKriteria::all();
        $opsi = Opsi::all();
        $nilai = penilaianAlternatif::where('lowongan_id', $id)->get();
        $dataSAW = [];
        $dataBaru = [];
        foreach ($nilai as $nilais) {
            if ($nilais) {
                foreach ($nilais->normalisasi($id) as $dt) {
                    $dataSAW[] = $dt;
                }
            }
        }
        foreach ($pendaftaran as $pendaftar) {
            $akhir = 0;

            foreach ($dataSAW as $key) {
                if ($key['pelamar_id'] == $pendaftar->pelamar_id) {
                    $found = false;
                    $akhir += $key['hasil_saw'];

                    foreach ($dataBaru as &$item) {
                        if ($item['pelamar_id'] == $key['pelamar_id']) {
                            $found = true;
                            $item['hasil_saw'] = $akhir;
                            break;
                        }
                    }

                    if (!$found) {
                        $dataBaru[] = [
                            'pelamar_id' => $key['pelamar_id'],
                            'name' => $key['name'],
                            'bobot_kriteria' => $key['bobot_kriteria'],
                            'hasil_normalisasi' => $key['hasil_normalisasi'],
                            'hasil_saw' => $akhir
                        ];
                    }
                }
            }

            usort($dataBaru, function ($a, $b) {
                return $b['hasil_saw'] <=> $a['hasil_saw'];
            });

            $ranking = 1;
            foreach ($dataBaru as &$item) {
                $item['ranking'] = $ranking;
                $ranking++;
            }

            hasilSaw::updateOrCreate(
                ['pelamar_id' => $pendaftar->pelamar_id],
                ['hasil' => $akhir]
            );
        }
        $array = [
            'lowker' => $lowker,
            'pelamar' => $pelamar,
            'pendaftaran' => $pendaftaran,
            'penilaian' => $penilaian,
            'subKriteria' => $subKriteria,
            'opsi' => $opsi,
            'date' => date("d-M-Y"),
            'dataSAW' => $dataSAW,
            'ranking' => $dataBaru,
        ];
        $pdf = Pdf::loadView('admin.penilaian.print', $array);
        return $pdf->download('Data_Penilaian.pdf');
    }

    public function updateStatus(Request $request, $id)
    {
        $data = pendaftaran::where('pelamar_id', $id)->first();
        $data->update(['status' => $request->status]);
        return redirect()->route('penilaian.view', ['id' => $data->lowongan_id])->with('message', 'Berhasil Update Status');
    }
}
