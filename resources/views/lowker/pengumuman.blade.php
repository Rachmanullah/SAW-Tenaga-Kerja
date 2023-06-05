@extends('layout')
@section('content')
<div class="container-fluid p-10">
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Setelah dilakukan penilaian dan perhitungan dengan metode SAW maka dihasil keputusan sebagai berikut :</span>
        </div>
    <div class="relative  flex col-span-2 overflow-x-auto shadow-md mt-5 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hasil Penilaian
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                $no = 1;
                @endphp
                @foreach($pendaftar as $pendaftars)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $no++ }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pendaftars->pelamars->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pendaftars->status }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pendaftars->pelamars->hasil_saws->hasil }}
                    </td>
                </tr>
                @empty($pendaftars)
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
