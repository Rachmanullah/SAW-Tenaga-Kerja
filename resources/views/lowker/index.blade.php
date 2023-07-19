@extends('layout')
@section('content')
<div class="container-fluid p-10">
    @if(session('message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success!</span> {{ session('message') }}
        </div>
    @endif
    <div class="relative  flex col-span-2 overflow-x-auto shadow-md mt-5 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lowker
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Divisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kuota
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mulai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Berakhir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Syarat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                $no = 1;
                @endphp
                @foreach($lowongan as $lowongans)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $no++ }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowongans->lowongan_kerja }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowongans->divisis->divisi }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowongans->kuota }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowongans->tgl_dimulai }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowongans->tgl_ditutup }}
                    </td>
                    <td class="px-6 py-4">
                        @foreach($bobotLowker as $bobotLowkers)
                        @if($bobotLowkers->lowongan_id === $lowongans->id)
                        <ul>
                            <li>
                                {{ $bobotLowkers->kriterias->kriteria }}
                            </li>
                        </ul>
                        @endif
                        @endforeach
                    </td>
                    <td class="px-6 py-4x space-x-3">
                        @if($lowongans->status == "Tutup")
                            <a class="font-medium">Tutup</a>
                        @elseif($lowongans->status == "Selesai")
                            <a href="{{ route('pengumuman', ['id' => $lowongans->id ]) }}" class="font-medium hover:underline"> Lihat Pengumuman</a>
                        @else
                            <a href="{{ route('daftar', ['id' => $lowongans->id ]) }}" class="font-medium hover:underline"> Daftar</a>
                        @endif
                    </td>
                </tr>
                @empty($lowongans)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap colspan-5 dark:text-white">
                        Data Tidak Ada
                    </td>
                </tr>
                @endempty
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
