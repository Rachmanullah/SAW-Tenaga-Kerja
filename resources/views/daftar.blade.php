@extends('layout')
@section('content')
<div class="container-fluid pt-14 p-10">
    <form class="space-y-1 " action="{{ route('daftar.store') }}" method="post">
        @csrf
        <input class="form-control" type="text" name="lowongan_id" value="{{ $lowongan->id }}" readonly hidden>
        <div>
            <label for="nama_pelamar" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap</label>
            <input type="text" name="nama_pelamar" id="nama_pelamar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
        </div>
        <div>
            <label for="tmp_lahir" class="block mb-2 text-sm font-medium text-gray-900 ">Tempat Lahir</label>
            <input type="text" name="tmp_lahir" id="tmp_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
        </div>
        <div>
            <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
        </div>
        <div>
            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 ">Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
        </div>
        <div>
            <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 ">Umur</label>
            <input type="number" name="umur" id="umur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
        </div>
        <div>
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 ">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
        </div>
        <div>
            <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 ">No Telp</label>
            <input type="text" name="no_telp" id="no_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
        </div>
        <div>
            <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 ">Agama</label>
            <select id="agama" name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Choose a Agama</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
            </select>
        </div>
        <div>
            <label for="pendidikan_akhir" class="block mb-2 text-sm font-medium text-gray-900 ">Pendidikan Terakhir</label>
            <select id="pendidikan_akhir" name="pendidikan_akhir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Choose a Pendidikan</option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="LAIN">LAIN</option>
            </select>
        </div>
        <button type="submit" class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar</button>
    </form>
</div>
@endsection
