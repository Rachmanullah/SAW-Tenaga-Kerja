@extends('admin.header')
@section('content')
    <div class="container w-full">
        <div class="text-3xl">
            <h1><i class="fa-solid fa-house"></i> HOME</h1>
        </div>
        <div class="content pt-5">
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-2 p-8 shadow-lg shadow-black rounded-md">
                    <div class="grid grid-cols-2">
                        <div class="col-rows-1  grid justify-start">
                            <h1 class="font-TitilliumWeb-Regular text-2xl">Pelamar</h1>
                            <p class="font-TitilliumWeb-BoldItalic text-3xl">{{ $countPelamar }}</p>
                        </div>
                        <div class="col-rows-2 grid justify-end">
                            <i class="fa-solid fa-user-plus text-center text-7xl"></i>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 p-8 shadow-lg shadow-black rounded-md">
                    <div class="grid grid-cols-2">
                        <div class="col-rows-1  grid justify-start">
                            <h1 class="font-TitilliumWeb-Regular text-2xl">Lowongan</h1>
                            <p class="font-TitilliumWeb-BoldItalic text-3xl">{{ $countLowongan }}</p>
                        </div>
                        <div class="col-rows-2 grid justify-end">
                            <i class="fa-solid fa-toolbox text-center text-7xl"></i>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 p-8 shadow-lg shadow-black rounded-md">
                    <div class="grid grid-cols-2">
                        <div class="col-rows-1  grid justify-start">
                            <h1 class="font-TitilliumWeb-Regular text-2xl">Diterima</h1>
                            <p class="font-TitilliumWeb-BoldItalic text-3xl">{{ $jmlDiterima }}</p>
                        </div>
                        <div class="col-rows-2 grid justify-end">
                            <i class="fa-solid fa-check text-center text-7xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-2xl mt-3">
                <h1 class="font-Kanit-Black"></h1>
            </div>
            <div class="overflow-x-auto shadow-md mt-5 sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lowongan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Diterima
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($rekap as $rekaps)
                        @php
                            $jmlDiterima = 0;
                        @endphp
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $no++ }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $rekaps->lowongan_kerja }}
                                </td>
                                <td class="px-6 py-4">
                                    @foreach ($rekaps->pendaftarans as $dftr)
                                    @if( $dftr->status == 'Terima')
                                        @php
                                            $jmlDiterima += 1
                                        @endphp
                                    @endif
                                    @endforeach
                                    {{ $jmlDiterima }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
