@extends('admin.header')
@section('content')
<div class="container">
    <div class="text-3xl">
        <h1 class="font-Kanit-Black"><i class="fa-solid fa-users fa-beat"></i> Data Lowongan</h1>
    </div>
    @if(session('message'))
    <div class="p-4 mt-3 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success alert!</span> {{ session('message') }}
    </div>
    @endif
    <button data-modal-target="addLowongan-modal" data-modal-toggle="addLowongan-modal" class="bg-blue-600 mt-5 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-12 rounded w-50">
        Add
    </button>
    <div class="relative overflow-x-auto shadow-md mt-5 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Mulai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Ditutup
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lowker
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kuota
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Divisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kriteria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
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
                @foreach($lowongan as $lowker)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $no++ }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowker->tgl_dimulai }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowker->tgl_ditutup }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowker->lowongan_kerja }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowker->kuota }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowker->divisis->divisi }}
                    </td>
                    <td class="px-6 py-4">
                        @foreach($bobotLowker as $bobotLowkers)
                        @if($bobotLowkers->lowongan_id === $lowker->id)
                        {{ $bobotLowkers->kriterias->kriteria }}
                        @endif
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        {{ $lowker->status }}
                    </td>
                    <td class="px-6 py-4x space-x-3">
                        <a href="#" class="font-medium hover:underline" type="button" data-modal-target="updateLowker-modal{{ $lowker->id }}" data-modal-toggle="updateLowker-modal{{ $lowker->id }}"><i class="fa-solid fa-pen fa-beat" style="color: #ffffff;"></i></a>
                        <a href="{{ route('lowongan.delete', ['id' => $lowker->id ]) }}" class="font-medium hover:underline"><i class="fa-solid fa-trash fa-beat" style="color: #fcfcfd;"></i></a>
                    </td>
                </tr>
                {{-- Modal Update Lowker --}}
                <div id="updateLowker-modal{{ $lowker->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="updateLowker-modal{{ $lowker->id }}">
                                <i class="fa-solid fa-xmark fa-beat"></i>
                                <span class="sr-only">Close</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Lowongan</h3>
                                <form class="space-y-1" action="{{ route('lowongan.update') }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <input class="form-control" type="text" name="id" value="{{ $lowker->id }}" readonly hidden>
                                    <div>
                                        <label for="tgl_dimulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Dimulai</label>
                                        <input type="date" name="tgl_dimulai" id="tgl_dimulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ $lowker->tgl_dimulai }}" required autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="tgl_ditutup" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Ditutup</label>
                                        <input type="date" name="tgl_ditutup" id="tgl_ditutup" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ $lowker->tgl_ditutup }}" required autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="lowongan_kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lowongan Kerja</label>
                                        <input type="text" name="lowongan_kerja" id="lowongan_kerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ $lowker->lowongan_kerja }}" required autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="kuota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kuota</label>
                                        <input type="number" name="kuota" id="kuota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ $lowker->kuota }}" required autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Divisi</label>
                                        <select id="divisi" name="divisi_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option seelcted value="{{ $lowker->divisi_id }}">{{ $lowker->divisis->divisi }}</option>
                                            <option disabled>Choose a Divisi</option>
                                            @foreach($divisi as $div)
                                            <option value="{{ $div->id }}">{{ $div->divisi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="{{ $lowker->status }}">{{ $lowker->status }}</option>
                                            <option disabled>Choose a Status</option>
                                            <option value="Buka">Buka</option>
                                            <option value="Tutup">Tutup</option>
                                        </select>
                                    </div>
                                    @foreach($bobotLowker as $bobotLowkers)
                                    @if($bobotLowkers->lowongan_id === $lowker->id)
                                    <input class="form-control" type="text" name="id_bobotLowkers[]" value="{{ $bobotLowkers->id }}" hidden>
                                    <div class="after-add-more">
                                        <label for="kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kriteria</label>
                                        <select id="kriteria" name="kriteria_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="{{ $bobotLowkers->kriteria_id }}">{{ $bobotLowkers->Kriterias->kriteria }}</option>
                                            <option disabled>Choose a Kriteria</option>
                                            @foreach($kriteria as $kriterias)
                                            <option value="{{ $kriterias->id }}">{{ $kriterias->kriteria }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    @endforeach

                                    <button type="submit" class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty($divisi)
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
    {{-- Modal Add Lowongan --}}
    <div id="addLowongan-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="addLowongan-modal">
                    <i class="fa-solid fa-xmark fa-beat"></i>
                    <span class="sr-only">Close</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add New Lowongan</h3>
                    <form class="space-y-1" action="{{ route('lowongan.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="tgl_dimulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dimulai</label>
                            <input type="date" name="tgl_dimulai" id="tgl_dimulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
                        </div>
                        <div>
                            <label for="tgl_ditutup" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ditutup</label>
                            <input type="date" name="tgl_ditutup" id="tgl_ditutup" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
                        </div>
                        <div>
                            <label for="lowongan_kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lowongan Kerja</label>
                            <input type="text" name="lowongan_kerja" id="lowongan_kerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
                        </div>
                        <div>
                            <label for="kuota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kuota</label>
                            <input type="number" name="kuota" id="kuota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
                        </div>
                        <div>
                            <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Divisi</label>
                            <select id="divisi" name="divisi_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Choose a Divisi</option>
                                @foreach($divisi as $div)
                                <option value="{{ $div->id }}">{{ $div->divisi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="after-add-more">
                            <label for="kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kriteria</label>
                            <select id="kriteria" name="kriteria_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Choose a Kriteria</option>
                                @foreach($kriteria as $kriterias)
                                <option value="{{ $kriterias->id }}">{{ $kriterias->kriteria }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Choose a Status</option>
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                            </select>
                        </div>
                        <button type="button" class="add-more bg-blue-600 mt-5 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-2 rounded w-50">
                            Add Kriteria
                        </button>
                        <button type="submit" class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copy invisible">
        <label for="kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kriteria</label>
        <select id="kriteria" name="kriteria_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled>Choose a Kriteria</option>
            @foreach($kriteria as $kriterias)
            <option value="{{ $kriterias->id }}">{{ $kriterias->kriteria }}</option>
            @endforeach
        </select>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });
        });

    </script>

</div>
@endsection
