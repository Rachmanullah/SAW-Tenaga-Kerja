@extends('admin.header')
@section('content')
<div class="container">
    <div class="text-3xl">
        <h1 class="font-Kanit-Black"><i class="fa-solid fa-user"></i> Data Role</h1>
    </div>
    @if(session('message'))
    <div class="p-4 mt-3 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success alert!</span> {{ session('message') }}
    </div>
    @endif
    <button data-modal-target="addRole-modal" data-modal-toggle="addRole-modal" class="bg-blue-600 mt-5 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-12 rounded w-50">
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
                        Role
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
                @foreach($data as $roles)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $no++ }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $roles->role }}
                    </td>
                    <td class="px-6 py-4x space-x-3">
                        <a href="#" class="font-medium hover:underline" type="button" data-modal-target="updateRole-modal{{ $roles->id }}" data-modal-toggle="updateRole-modal{{ $roles->id }}"><i class="fa-solid fa-pen fa-beat" style="color: #ffffff;"></i></a>
                        <a href="{{ route('user.delete', ['id' => $roles->id ]) }}" class="font-medium hover:underline"><i class="fa-solid fa-trash fa-beat" style="color: #fcfcfd;"></i></a>
                    </td>
                </tr>
                {{-- Modal Update role --}}
                <div id="updateRole-modal{{ $roles->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="updateRole-modal{{ $roles->id }}">
                                <i class="fa-solid fa-xmark fa-beat"></i>
                                <span class="sr-only">Close</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update {{ $roles->role }}</h3>
                                <form class="space-y-1" action="{{ route('role.update') }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <input class="form-control" type="text" name="id" value="{{ $roles->id }}" readonly hidden>
                                    <div>
                                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                        <input type="text" name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Ex:Moch Arif R" value="{{ $roles->role }}" required autocomplete="off">
                                    </div>
                                    <button type="submit" class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty($roles)
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
    {{-- Modal Add Role --}}
    <div id="addRole-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="addRole-modal">
                    <i class="fa-solid fa-xmark fa-beat"></i>
                    <span class="sr-only">Close</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add New Role</h3>
                    <form class="space-y-1" action="{{ route('role.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                            <input type="text" name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="off">
                        </div>
                        {{-- <div>
                            <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an Position</label>
                            <select id="position" name="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Choose a position</option>
                                <option value="Pimpinan">Pimpinan</option>
                                <option value="HRD">HRD</option>
                            </select>
                        </div> --}}
                        <button type="submit" class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
