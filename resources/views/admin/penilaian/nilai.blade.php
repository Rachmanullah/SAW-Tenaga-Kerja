@extends('admin.header')
@section('content')
<div class="container">
    <div class="text-3xl mb-5">
        <h1 class="font-Kanit-Black">Data SAW {{ $lowker->lowongan_kerja }}</h1>
    </div>
    <a href="{{ route('penilaian.print',['id'=> $lowker->id]) }}" class="bg-blue-600 mt-5 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-12 rounded w-50">
        <i class="fa-solid fa-print "></i>
    </a>
    @if(session('message'))
    <div class="p-4 mt-3 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success alert!</span> {{ session('message') }}
    </div>
    @endif
    <div class="text-2xl mt-5">
        <h1 class="font-Kanit-Black">Tabel Penilaian</h1>
    </div>
    <div class="overflow-x-auto shadow-md mt-5 sm:rounded-lg">
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
                    @php
                    $total = 0;
                    @endphp
                    @foreach($lowker->bobotLowker as $bobotLowkers )
                        @foreach($penilaian as $nilai)
                            @if($nilai->pelamar_id == $pendaftarans->pelamar_id && $nilai->kriteria_id == $bobotLowkers->kriteria_id)
                                <td class="px-6 py-4">
                                    {{ $nilai->nilai }}
                                    @php
                                        $total += $nilai->nilai ;
                                    @endphp
                                </td>
                            @endif
                        @endforeach
                    @endforeach
                    <td class="px-6 py-4">
                        @if($total == 0)
                            <a href="#" class="font-medium hover:underline" type="button" data-modal-target="nilai-modal{{ $pendaftarans->id }}" data-modal-toggle="nilai-modal{{ $pendaftarans->id }}"><i class="fa-solid fa-pen fa-beat" style="color: #ffffff;"></i> Buat Nilai</a>
                        @else
                            {{ $total }}
                        @endif
                        {{-- modal nilai --}}
                        <div id="nilai-modal{{ $pendaftarans->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="nilai-modal{{ $pendaftarans->id }}">
                                        <i class="fa-solid fa-xmark fa-beat"></i>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Nilai {{ $pendaftarans->pelamars->name }}</h3>
                                        <form class="space-y-1" action="{{ route('penilaian.input') }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <input class="form-control" type="text" name="pelamar_id" value="{{ $pendaftarans->pelamars->id }}" hidden readonly >
                                            <input class="form-control" type="text" name="lowongan_id" value="{{ $pendaftarans->lowongans->id }}" hidden readonly >
                                            @foreach($lowker->bobotLowker as $bobotLowkers)
                                            <h3 class="text-sm text-white">Input Penilaian {{ $bobotLowkers->kriterias->kriteria }}</h3>
                                                @if($bobotLowkers->kriterias->subKriterias->count() > 0)
                                                    @foreach($subKriteria as $subKriterias)
                                                        @if($subKriterias->kriteria_id == $bobotLowkers->kriterias->id)
                                                        <div class="relative z-0 w-full mb-1 group">
                                                            <label class="text-sm text-gray-500 dark:text-gray-400" id="{{ $subKriterias->sub_kriteria }}">{{ $subKriterias->sub_kriteria }}</label>
                                                            <select id="sub_kriteria-{{ $subKriterias->id }}" required name="sub_kriteria[{{ $subKriterias->id }}]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected disabled>{{ $subKriterias->sub_kriteria }}</option>
                                                                @foreach($opsi as $opsis)
                                                                    @if($opsis->sub_kriteria_id == $subKriterias->id)
                                                                        <option value="{{ $opsis->nilai_opsi }}">{{ $opsis->opsi }}[{{ $opsis->nilai_opsi }}]</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <div class="relative z-0 w-full mb-2 group">
                                                        <input type="number" name="data[{{ str_replace(' ', '_', $bobotLowkers->kriterias->kriteria) }}]" id="umur" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required autocomplete="off" />
                                                        <label for="umur" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ $bobotLowkers->kriterias->kriteria }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <button type="submit" class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
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
    <div class="text-2xl mt-3">
        <h1 class="font-Kanit-Black">Tabel Normalisasi</h1>
    </div>
    <div class="overflow-x-auto shadow-md mt-5 sm:rounded-lg">
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
                    @foreach($dataSAW as $datas )
                            @if($datas['pelamar_id'] == $pendaftarans->pelamar_id)
                                <td class="px-6 py-4">
                                    {{ $datas['hasil_normalisasi'] }}
                                </td>
                                @endif
                    @endforeach
                </tr>
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
    <div class="text-2xl mt-3">
        <h1 class="font-Kanit-Black">Tabel Perhitungan</h1>
    </div>
    <div class="overflow-x-auto shadow-md mt-5 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alternatif
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Perhitungan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hasil
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
                    @php
                    $total_akhir = 0;
                    @endphp
                    <td class="px-6 py-4">
                        @foreach($dataSAW as $datas )
                            @if($datas['pelamar_id'] == $pendaftarans->pelamar_id)
                                ({{ $datas['bobot_kriteria'] }} x {{ $datas['hasil_normalisasi'] }})
                                @php
                                    $total_akhir += $datas['hasil_saw']
                                @endphp
                            @endif
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        {{ $total_akhir }}
                    </td>
                </tr>
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
    <p class="mt-3">
        Setelah Dilakukan Perhitungan Dengan Metode SAW maka didapatkan {{ $lowker->kuota }} Peserta dengan nilai terbesar yaitu
    </p>
    <div class="overflow-x-auto shadow-md mt-5 sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alternatif
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Hasil
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ranking
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
                    @foreach($ranking as $rankings)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $no++ }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $rankings['name'] }}
                        </td>
                        @php
                        $total_akhir = 0;
                        @endphp
                        <td class="px-6 py-4">
                            @foreach($dataSAW as $datas )
                                @if($datas['pelamar_id'] == $rankings['pelamar_id'])
                                    @php
                                        $total_akhir += $datas['hasil_saw']
                                    @endphp
                                @endif
                            @endforeach
                            {{ $total_akhir }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $rankings['ranking'] }}
                        </td>
                        <td class="px-6 py-4">
                            @if(!$rankings['hasil_saw'] == 0)
                            <a href="#" data-modal-target="status-modal{{ $rankings['pelamar_id'] }}" data-modal-toggle="status-modal{{ $rankings['pelamar_id'] }}" class="font-medium hover:underline bg-blue-500 p-1 text-black" type="button">Aksi</a>
                            @endif
                        </td>
                        <div id="status-modal{{ $rankings['pelamar_id'] }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="status-modal{{ $rankings['pelamar_id'] }}">
                                        <i class="fa-solid fa-xmark fa-beat"></i>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ $rankings['name'] }}</h3>
                                        <form class="space-y-1" action="{{ route('penilaian.updateStatus',['id' => $rankings['pelamar_id']]) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                                <div class="relative z-0 w-full mb-1 group">
                                                    <label class="text-sm text-gray-500 dark:text-gray-400" id="labelSatus">Status</label>
                                                    <select id="status" required name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option disabled selected>Pilih Status</option>
                                                        <Option value="Terima">Terima</Option>
                                                        <Option value="Tidak Terima">Tidak Terima</Option>
                                                    </select>
                                                </div>
                                            <button type="submit" class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                        @empty($rankings)
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
