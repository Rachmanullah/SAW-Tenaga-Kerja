@extends('admin.header')
@section('content')
<div class="container">
    <div class="text-3xl">
        <h1><i class="fa-solid fa-user"></i> Data Diri {{ auth()->user()->name }}</h1>
    </div>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col items-center">
            <img class="w-36 h-36 m-3 rounded-full" src="http://127.0.0.1:8000/assets/image/{{ auth()->user()->foto }}"
                alt="foto" />
        </div>
        <div class="p-5">
            <form action="{{ route('update.profile') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="relative z-0 w-full mb-2 group">
                    <label for="name" class="block mb-1 text-sm font-medium text-white">Ganti Foto</label>
                    <input type="file" name="foto"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ auth()->user()->foto }}">
                </div>
                <div class="relative z-0 w-full mb-2 group">
                    <label for="name" class="block mb-1 text-sm font-medium text-white">Nama Lengkap</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ auth()->user()->name }}" required>
                </div>
                <div class="relative z-0 w-full mb-2 group">
                    <label for="email" class="block mb-1 text-sm font-medium text-white">Email</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ auth()->user()->email }}" required>
                </div>
                <div class="relative z-0 w-full mb-2 group">
                    <label for="phone" class="block mb-1 text-sm font-medium text-white">No Telp</label>
                    <input type="text" id="phone" name="phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ auth()->user()->phone}}" required>
                </div>
                <div class="relative z-0 w-full mb-2 group">
                    <label for="role_id" class="block mb-1 text-sm font-medium text-white">Role</label>
                    <input type="text" id="role_id" name="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ auth()->user()->roles->role}}" readonly required>
                </div>
                <button type="submit"
                    class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
