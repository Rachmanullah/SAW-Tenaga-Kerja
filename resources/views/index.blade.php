@extends('layout')
@section('content')
<div class="container-fluid max-w-full bg-gray-300">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:px-8 pt-16 pb-36">
        <div class="flex flex-col justify-center mr-10">
            <h2 class="font-Kanit-Black text-5xl mb-8">
                Welcome To <span class="text-[#0B8F98]">Ar</span><span class="text-[#E7702D]">kit</span> Company
            </h2>
            <p>
                Metode SAW merupakan metode yang menggunakan perhitungan atau yang menyediakan jenis-jenis kriteria tertentu
                yang memiliki bobot hingga nilai akhir yang berbobot akan menjadi keputusan akhir. Perhitungan Simple Additive
                Weighting (SAW) mengacu pada kriteria masyarakat yang layak menerima sesuai data yang relevan.
            </p>
        </div>
        <div class="md-col-start-2">
            <img class="rounded-xl skew-y-6 shadow-lg shadow-black" src="{{url('/assets/image/building.jpg')}}" alt="Image" />

        </div>
    </div>

</div>
@endsection
