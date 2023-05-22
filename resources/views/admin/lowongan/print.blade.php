<!DOCTYPE html>
<html>

<head>
    <title>Arkit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Laporan Data Lowongan</h2>
    <p>Waktu : {{ $date }}</p>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>Mulai</th>
            <th>Tutup</th>
            <th>Lowongan</th>
            <th>kuota</th>
            <th>Divisi</th>
        </tr>
        @foreach($lowker as $lowkers)
        <tr class="text-center">
            <td>{{ $lowkers->tgl_dimulai }}</td>
            <td>{{ $lowkers->tgl_ditutup }}</td>
            <td>{{ $lowkers->lowongan_kerja }}</td>
            <td>{{ $lowkers->kuota }}</td>
            <td>{{ $lowkers->divisis->divisi }}</td>
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
