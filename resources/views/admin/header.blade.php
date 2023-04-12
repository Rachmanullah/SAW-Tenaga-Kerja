<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/fontawesome/css/all.css">
    <title>Arkit</title>
</head>
<body>
    <div class="relative flex h-screen w-screen">
        {{-- sidebar --}}
        <div class="fixed md:relative left-0 w-60 bg-slate-300 flex flex-col h-screen">
            {{-- logo --}}
            <div class="flex flex-row items-center h-12 pt-2 bg-slate-800 w-full justify-center">
                {{-- <div class="h-10 w-10 rounded-full overflow-hidden mr-2 grid place-items-center bg-slate-800 text-slate-200 font-TitilliumWeb-BoldItalic">SS</div>
                <div class="text-lg">SI SAW</div> --}}
                <img src="http://127.0.0.1:8000/assets/image/logoArkit2.png" alt="" width="90">
            </div>
            {{-- sidebar menu --}}
            <div class="p-2">
                <ul>
                    {{-- Home --}}
                    <li class="h-10 w-full  rounded-md flex items-center my-2 {{ request()->routeIs('dashboard') ? 'bg-orange-500' : 'bg-slate-800' }} text-slate-300 cursor-pointer hover:bg-gray-700">
                        <a href="{{ route('dashboard') }}" class="flex flex-row text-md ml-3">
                            <i class="fa-solid fa-house h-5 w-5 fa-beat" style="color: #fafafa;"></i>
                            <h3 class="ml-4 text-sm">Home</h3>
                        </a>
                    </li>
                    {{-- Data User --}}
                    <li class="h-10 w-full {{ request()->routeIs('data.user') ? 'bg-orange-500' : 'bg-slate-800' }} rounded-md flex items-center my-2 text-slate-300 cursor-pointer hover:bg-gray-700">
                        <a href="{{ route('data.user') }}" class="flex flex-row text-md ml-3">
                            <i class="fa-solid fa-user fa-beat" style="color: #fafafa;"></i>
                            <h3 class="ml-5 text-sm">Data User</h3>
                        </a>
                    </li>
                    {{-- Data Role --}}
                    <li class="h-10 w-full {{ request()->routeIs('data.role') ? 'bg-orange-500' : 'bg-slate-800' }} rounded-md flex items-center my-2 text-slate-300 cursor-pointer hover:bg-gray-700">
                        <a href="{{ route('data.role') }}" class="flex flex-row text-md ml-3">
                            <i class="fa-solid fa-user fa-beat" style="color: #fafafa;"></i>
                            <h3 class="ml-5 text-sm">Data Role</h3>
                        </a>
                    </li>
                    {{-- Data Pelamar --}}
                    <li class="h-10 w-full {{ request()->routeIs('data.pelamar') ? 'bg-orange-500' : 'bg-slate-800' }} rounded-md flex items-center my-2 text-slate-300 cursor-pointer hover:bg-gray-700">
                        <a href="{{ route('data.pelamar') }}" class="flex flex-row text-md ml-3">
                            <i class="fa-solid fa-user-plus fa-beat" style="color: #ffffff;"></i>
                            <h3 class="ml-4 text-sm">Data Pelamar</h3>
                        </a>
                    </li>
                    {{-- Data Divisi --}}
                    <li class="h-10 w-full {{ request()->routeIs('data.divisi') ? 'bg-orange-500' : 'bg-slate-800' }} rounded-md flex items-center my-2 text-slate-300 cursor-pointer hover:bg-gray-700">
                        <a href="{{ route('data.divisi') }}" class="flex flex-row text-md ml-3">
                            <i class="fa-solid fa-users fa-beat" style="color: #ffffff;"></i>
                            <h3 class="ml-4 text-sm">Data Divisi</h3>
                        </a>
                    </li>
                    {{-- Data Lowongan --}}
                    <li class="h-10 w-full {{ request()->routeIs('data.lowongan') ? 'bg-orange-500' : 'bg-slate-800' }} rounded-md flex items-center my-2 text-slate-300 cursor-pointer hover:bg-gray-700">
                        <a href="{{ route('data.lowongan') }}" class="flex flex-row text-md ml-3">
                            <i class="fa-solid fa-toolbox fa-beat" style="color: #ffffff;"></i>
                            <h3 class="ml-4 text-sm">Data Lowongan</h3>
                        </a>
                    </li>
                    {{-- Data Kriteria --}}
                    <li class="h-10 w-full {{ request()->routeIs('data.kriteria') ? 'bg-orange-500' : 'bg-slate-800' }} rounded-md flex items-center my-2 text-slate-300 cursor-pointer hover:bg-gray-700">
                        <a href="{{ route('data.kriteria') }}" class="flex flex-row text-md ml-3">
                            <i class="fa-solid fa-scale-balanced fa-beat" style="color: #ffffff;"></i>
                            <h3 class="ml-4 text-sm">Data Kriteria</h3>
                        </a>
                    </li>
                    {{-- Data Sub Kriteria --}}
                    <li class="h-10 w-full {{ request()->routeIs('data.subKriteria') ? 'bg-orange-500' : 'bg-slate-800' }} rounded-md flex items-center my-2 text-slate-300 cursor-pointer hover:bg-gray-700">
                        <a href="{{ route('data.subKriteria') }}" class="flex flex-row text-md ml-3">
                            <i class="fa-solid fa-scale-unbalanced-flip fa-beat" style="color: #ffffff;"></i>
                            <h3 class="ml-4 text-sm">Data Sub Kriteria</h3>
                        </a>
                    </li>
                    {{-- Data Hasil SAW --}}
                    <li class="h-10 w-full bg-slate-800 rounded-md flex items-center my-2 text-slate-300 cursor-pointer hover:bg-gray-700">
                        <a href="#" class="flex flex-row text-md ml-3">
                            <i class="fa-solid fa-list-check fa-beat" style="color: #ffffff;"></i>
                            <h3 class="ml-5 text-sm">Data Hasil SAW</h3>
                        </a>
                    </li>

                </ul>
            </div>
            {{-- open and clode side bar --}}
            {{-- <div class="h-screen w-10 absolute -right-5 top-0 flex items-center">
                <div class="h-10 w-10 rounded-full overflow-hidden grid place-items-center bg-slate-300 cursor-pointer">
                    <i class="fa-solid fa-bars p-2 text-white"></i>
                </div>
            </div> --}}
        </div>
        <div class="flex-1">
            {{-- navbar --}}
            <nav class="navbar left-0 right-0 top-0 bg-slate-800 shadow h-12 items-end">
                {{-- Profile --}}
                <div class="p-1 flex justify-end">
                    <div class="space-x-3">
                        <i class="fa-solid fa-bell text-white"></i>
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">{{ auth()->user()->name }}<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="{{ route('home') }}" target="_blank" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye fa-beat" style="color: #fafafa;"></i> View Website</a>
                                </li>
                                <li>
                                    <a href="{{route('logout',['id'=> auth()->user()->id ])}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-arrow-right-from-bracket fa-beat" style="color: #f7f9fc;"></i> Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="pt-5 pr-10 pl-10">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/fontawesome.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/fontawesome.js"></script>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/all.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>
