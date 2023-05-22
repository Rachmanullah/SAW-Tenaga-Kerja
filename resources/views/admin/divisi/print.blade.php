<!DOCTYPE html>
<html>

<head>
    <title>Arkit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Laporan Data Divisi</h2>
    <p>Waktu : {{ $date }}</p>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Divisi</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach($divisi as $divisis)
        <tr class="text-center">
            <td>{{ $no }}</td>
            <td>{{ $divisis->divisi }}</td>
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
