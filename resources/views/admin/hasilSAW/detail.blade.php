@extends('admin.header')
@section('content')
<div class="container">
    <div class="text-3xl">
        <h1 class="font-Kanit-Black"><i class="fa-solid fa-list-check fa-beat"></i> Data Penilaian {{ $lowker->lowongan_kerja }}</h1>
    </div>
    @if(session('message'))
    <div class="p-4 mt-3 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success alert!</span> {{ session('message') }}
    </div>
    @endif
    {{-- <button data-modal-target="addLowongan-modal" data-modal-toggle="addLowongan-modal" class="bg-blue-600 mt-5 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-12 rounded w-50">
        Add
    </button> --}}
    <div class="p-4 mt-3 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Nilai dibawah hasil dari perhitungan bobot sub kriteria bagi kriteria yang memiliki sub kriteria.</span>
    </div>
    <div class="relative overflow-x-auto shadow-md mt-5 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alternatif
                    </th>
                    @foreach($lowker->bobotLowker as $bobotLowkers)
                    <th scope="col" class="px-6 py-3">
                        {{ $bobotLowkers->kriterias->kriteria }} [{{ $bobotLowkers->kriterias->bobot }}%]
                    </th>
                    @endforeach
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                $no = 1;
                @endphp
                @foreach($pendaftaran as $pendaftarans)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $no++ }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pendaftarans->pelamars->name }}
                    </td>
                    @foreach($lowker->bobotLowker as $bobotLowkers )
                    @foreach($penilaian as $nilai)
                        @if($nilai->pelamar_id == $pendaftarans->pelamar_id && $nilai->kriteria_id == $bobotLowkers->kriteria_id)
                        <td class="px-6 py-4">
                            {{  $nilai->nilai }}
                        </td>
                        @endif
                    @endforeach
                    @endforeach
                    <td class="px-6 py-4">
                    @php
                        $total = 0;
                    @endphp
                    @foreach($lowker->bobotLowker as $bobotLowkers )
                    @foreach($penilaian as $nilai)
                        @if($nilai->pelamar_id == $pendaftarans->pelamar_id && $nilai->kriteria_id == $bobotLowkers->kriteria_id)
                        @php
                        $total += $nilai->nilai ;
                        @endphp
                        @endif
                    @endforeach
                    @endforeach
                    {{  $total }}
                    </td>
                @empty($lowker)
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
