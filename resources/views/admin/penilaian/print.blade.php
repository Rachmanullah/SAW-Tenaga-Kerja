<!DOCTYPE html>
<html>

<head>
    <title>Arkit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Laporan Data Penilaian</h2>
    <p>Waktu : {{ $date }}</p>
    <p>Lowongan Kerja : {{ $lowker->lowongan_kerja }}</p>
    <p>Divisi : {{ $lowker->divisis->divisi }}</p>
    <p>Tabel Penilaian</p>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Alternatif</th>
            @foreach($lowker->bobotLowker as $bobotLowkers)
            <th>
                {{ $bobotLowkers->kriterias->kriteria }} [{{ $bobotLowkers->kriterias->bobot }}%]
            </th>
            @endforeach
            <th>
                Total
            </th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach($pendaftaran as $pendaftarans)
        <tr class="text-center">
            <td>
                {{ $no++ }}
            </td>
            <td>
                {{ $pendaftarans->pelamars->name }}
            </td>
            @php
            $total = 0;
            @endphp
            @foreach($lowker->bobotLowker as $bobotLowkers )
            @foreach($penilaian as $nilai)
            @if($nilai->pelamar_id == $pendaftarans->pelamar_id && $nilai->kriteria_id == $bobotLowkers->kriteria_id)
            <td>
                {{ $nilai->nilai }}
                @php
                $total += $nilai->nilai ;
                @endphp
            </td>
            @endif
            @endforeach
            @endforeach
            <td>
                {{ $total }}
            </td>
        </tr>
        @endforeach
    </table>
    <p>Tabel Normalisasi</p>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Alternatif</th>
            @foreach($lowker->bobotLowker as $bobotLowkers)
            <th>
                {{ $bobotLowkers->kriterias->kriteria }} [{{ $bobotLowkers->kriterias->bobot }}%]
            </th>
            @endforeach
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach($pendaftaran as $pendaftarans)
        <tr class="text-center">
            <td>
                {{ $no++ }}
            </td>
            <td>
                {{ $pendaftarans->pelamars->name }}
            </td>
            @foreach($dataSAW as $datas )
            @if($datas['id'] == $pendaftarans->pelamar_id)
            <td>
                {{ $datas['hasil_normalisasi'] }}
            </td>
            @endif
            @endforeach
        </tr>
        @endforeach
    </table>
    <p>Tabel Perhitungan</p>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Perhitungan</th>
            <th>Hasil</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach($pendaftaran as $pendaftarans)
        <tr class="text-center">
            <td>
                {{ $no++ }}
            </td>
            <td>
                {{ $pendaftarans->pelamars->name }}
            </td>
            @php
            $total_akhir = 0;
            @endphp
            <td>
                @foreach($dataSAW as $datas )
                @if($datas['id'] == $pendaftarans->pelamar_id)
                ({{ $datas['bobot_kriteria'] }} x {{ $datas['hasil_normalisasi'] }})
                @php
                    $total_akhir += $datas['hasil_saw']
                @endphp
                @endif
                @endforeach
            </td>
            <td>
                {{ $total_akhir }}
            </td>
        </tr>
        @endforeach
    </table>
    <div class="float-right">
        <p class="text-center">Malang, {{ $date }}</p>
        <p class="text-center">{{ auth()->user()->roles->role }}</p>
        <br><br><br>
        <p class="text-center">{{ auth()->user()->name }}</p>
    </div>
</body>
</html>
