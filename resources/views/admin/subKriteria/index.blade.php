@extends('admin.header')
@section('content')
<div class="container">
    <div class="text-3xl">
        <h1 class="font-Kanit-Black"><i class="fa-solid fa-users fa-beat"></i> Data Sub Kriteria</h1>
    </div>
    @if(session('message'))
    <div class="p-4 mt-3 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success alert!</span> {{ session('message') }}
    </div>
    @endif
    <div class="relative overflow-x-auto shadow-md mt-5 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kriteria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sub Kriteria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bobot Sub
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Opsi
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
                @foreach($subKriteria as $subKriterias)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $no++ }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $subKriterias->kriterias->kriteria }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $subKriterias->sub_kriteria }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $subKriterias->nilai_sub_kriteria }}%
                    </td>
                    <td class="px-6 py-4">
                        @foreach($subKriterias->opsis as $opsis)
                        {{ $opsis->opsi }} [{{ $opsis->nilai_opsi }}] <a href="{{ route('opsi.destroy',['id'=> $opsis->id]) }}" class="font-medium hover:underline" type="button" ><i class="fa-solid fa-minus fa-beat"style="color: #f7f7f7;"></i></a> <br>
                        @endforeach
                        <a href="#" class="font-medium hover:underline" type="button" data-modal-target="addOpsi-modal{{ $subKriterias->id }}" data-modal-toggle="addOpsi-modal{{ $subKriterias->id }}"><i class="fa-solid fa-plus fa-beat" style="color: #fafafa;"></i></a>
                    </td>
                    <td class="px-6 py-4x space-x-3">
                        <a href="{{ route('subKriteria.delete', ['id' => $subKriterias->id ]) }}" class="font-medium hover:underline"><i class="fa-solid fa-trash fa-beat" style="color: #fcfcfd;"></i></a>
                        {{-- modal opsi --}}
                        <div id="addOpsi-modal{{ $subKriterias->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="addOpsi-modal{{ $subKriterias->id }}">
                                        <i class="fa-solid fa-xmark fa-beat"></i>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Opsi {{ $subKriterias->sub_kriteria }}</h3>
                                        <form class="space-y-1" action="{{ route('opsi.store') }}" method="post">
                                            @csrf
                                            <input class="form-control" type="text" name="id" value="{{ $subKriterias->id }}" readonly hidden>
                                            <div class="add_opsi">
                                                <div>
                                                    <label for="opsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opsi</label>
                                                    <input type="text" name="opsi[]" id="opsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Opsi" required autocomplete="off">
                                                </div>
                                                <div>
                                                    <label for="nilai_opsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Opsi</label>
                                                    <input type="number" name="nilai_opsi[]" id="nilai_opsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nilai Opsi" required autocomplete="off">
                                                </div>
                                            </div>
                                            <button type="button" class="add-more bg-blue-600 mt-5 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-2 rounded w-50">
                                                Add Opsi
                                            </button>
                                            <button type="submit" class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty($subKriterias)
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
    <div class="copy invisible">
        <div>
            <label for="opsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opsi</label>
            <input type="text" name="opsi[]" id="opsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Opsi" autocomplete="off">
        </div>
        <div>
            <label for="nilai_opsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Opsi</label>
            <input type="number" name="nilai_opsi[]" id="nilai_opsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nilai Opsi" autocomplete="off">
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".add_opsi").after(html);
            });
        });

    </script>
</div>
@endsection
