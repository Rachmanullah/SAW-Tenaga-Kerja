@extends('admin.header')
@section('content')
<div class="container">
    <div class="text-3xl">
        <h1><i class="fa-solid fa-user-plus"></i> Data Pelamar</h1>
    </div>
    <button data-modal-target="print-modal" data-modal-toggle="print-modal" class="bg-blue-600 mt-5 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-12 rounded w-50">
        <i class="fa-solid fa-print "></i>
    </button>
    <div class=" overflow-x-auto shadow-md mt-5 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lowongan
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
                @foreach($data as $pelamars)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $no++ }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pelamars->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pelamars->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pelamars->no_telp }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pelamars->pendaftarans->lowongans->lowongan_kerja }}
                    </td>
                    <td class="px-6 py-4x space-x-3">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Modal Print --}}
    <div id="print-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="print-modal">
                    <i class="fa-solid fa-xmark fa-beat"></i>
                    <span class="sr-only">Close</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Print</h3>
                    <form class="space-y-1" action="{{ route('pelamar.print') }}" method="post">
                        @csrf
                        <div>
                            <label for="lowongan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lowongan</label>
                            <select id="lowongan" name="lowongan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Choose a Lowongan</option>
                                @foreach($lowker as $lowkers)
                                <option value="{{ $lowkers->id }}">{{ $lowkers->lowongan_kerja }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Print</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
