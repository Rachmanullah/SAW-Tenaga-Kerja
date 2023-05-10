@extends('admin.header')
@section('content')
<div class="container">
    <div class="text-3xl">
        <h1 class="font-Kanit-Black"><i class="fa-solid fa-list-check fa-beat"></i> Data SAW</h1>
    </div>
    @if(session('message'))
    <div class="p-4 mt-3 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success alert!</span> {{ session('message') }}
    </div>
    @endif
    {{-- <button data-modal-target="addLowongan-modal" data-modal-toggle="addLowongan-modal" class="bg-blue-600 mt-5 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-12 rounded w-50">
        Add
    </button> --}}
    <div class="relative overflow-x-auto shadow-md mt-5 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lowongan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Alternatif
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kriteria
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
                @foreach($lowker as $lowkers)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $no++ }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowkers->lowongan_kerja }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowkers->pendaftarans->count() }}
                    </td>
                    <td class="px-6 py-4">
                        @foreach($lowkers->bobotLowker as $bobotLowkers)
                        @if($bobotLowkers->lowongan_id == $lowkers->id)
                        {{ $bobotLowkers->kriterias->kriteria }}<br>
                        @endif
                        @endforeach
                    </td>
                    <td class="px-6 py-4x space-x-3">
                        {{-- <a href="#" class="font-medium hover:underline" type="button" data-modal-target="updateLowker-modal{{ $lowker->id }}" data-modal-toggle="updateLowker-modal{{ $lowker->id }}"><i class="fa-solid fa-pen fa-beat" style="color: #ffffff;"></i></a> --}}
                        <a href="{{ route('penilaian.view', ['id' => $lowkers->id ]) }}" class="font-medium hover:underline"><i class="fa-solid fa-circle-info fa-beat" style="color: #ffffff;"></i></a>
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
