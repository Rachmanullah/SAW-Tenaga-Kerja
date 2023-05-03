<!DOCTYPE html>
<html>

<head>
    <title>Arkit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Laporan Data Pelamar</h2>
    <p>Waktu : {{ $date }}</p>
    <p>Divisi : {{ $divisi }}</p>
    <p>Berikut Data Pelamar pada lowongan kerja {{ $lowker }} dari divisi {{ $divisi }} :</p>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Lowongan</th>
        </tr>
        @foreach($data as $pendaftar)
        <tr class="text-center">
            <td>{{ $pendaftar->pelamars->name }}</td>
            <td>{{ $pendaftar->pelamars->email }}</td>
            <td>{{ $pendaftar->pelamars->no_telp }}</td>
            <td>{{ $pendaftar->lowongans->lowongan_kerja }}</td>
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
