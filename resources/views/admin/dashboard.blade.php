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
                        <i class="fa-solid fa-user-plus relative text-center text-7xl "></i>
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
                        <i class="fa-solid fa-user-plus relative text-center text-7xl "></i>
                    </div>
                </div>
            </div>
            <div class="col-span-2 p-8 shadow-lg shadow-black rounded-md">
                <div class="grid grid-cols-2">
                    <div class="col-rows-1  grid justify-start">
                        <h1 class="font-TitilliumWeb-Regular text-2xl">Diterima</h1>
                        <p class="font-TitilliumWeb-BoldItalic text-3xl">1</p>
                    </div>
                    <div class="col-rows-2 grid justify-end">
                        <i class="fa-solid fa-user-plus relative text-center text-7xl "></i>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection
