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

</head>
<body>
    <div class="relative flex min-h-screen">
        {{-- sidebar --}}
        <div class="sidebar w-60 p-3 text-center bg-neutral-800 fixed inset-y-0 left-0 transform -translate-x-full duration-900 ease-in md:relative md:-translate-x-0">
            <div class="text-xl">
                <div class="p-1 px-1 flex items-center text-gray-200">
                    <span class="font-Kanit-Black text-[15px] ml-16">SI SAW</span>
                </div>
                <hr class=" text-gray-600">
            </div>
            <div class="p-2.5 mt-3 space-x-5 flex items-center rounded-md px-4 hover:bg-black ease-in duration-500 cursor-pointer bg-slate-600">
                <i class="fa-solid fa-house" style="color: #fafafa;"></i>
                <span class="text-[15px] ml-4 text-gray-200">Home</span>
            </div>
            <div class="p-2.5 mt-3 space-x-6 flex items-center rounded-md px-4 hover:bg-black ease-in duration-500 cursor-pointer bg-slate-600">
                <i class="fa-solid fa-user" style="color: #fafafa;"></i>
                <span class="text-[15px] ml-4 text-gray-200">Data User</span>
            </div>
            <div class="p-2.5 mt-3 space-x-5 flex items-center rounded-md px-4 hover:bg-black ease-in duration-500 cursor-pointer bg-slate-600">
                <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                <span class="text-[15px] ml-4 text-gray-200">Data Pelamar</span>
            </div>
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 hover:bg-black ease-in duration-500 cursor-pointer bg-slate-600" onclick="dropdown()">
                <div class="flex justify-between w-full items-center">
                    <span class="text-[15px] ml-4 text-gray-200">Data SAW</span>
                </div>
            </div>
            <div class="text-left text-sm font-bold mt-2 w-4/5 mx-auto" id="sub-menu">
                <h1 class="cursor-pointer p-2 hover:bg-black ease-in duration-500 rounded-md mt-1 text-gray-200">Data Kriteria</h1>
                <h1 class="cursor-pointer p-2 hover:bg-black ease-in duration-500 rounded-md mt-1 text-gray-200">Data Sub Kriteria</h1>
            </div>
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 hover:bg-black ease-in duration-500 cursor-pointer bg-slate-600">

                <span class="text-[15px] ml-4 text-gray-200">Data Lowongan</span>
            </div>
            <div class="p-2.5 mt-3 space-x-5 flex items-center rounded-md px-4 hover:bg-black ease-in duration-500 cursor-pointer bg-red-600">


                <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>
                <span class="text-[15px] ml-4 text-gray-200">Logout</span>
            </div>
        </div>
        {{-- main content --}}
        <div class="flex-1">
            {{-- navbar --}}
            <nav class="navbar left -0 right-0 top-0 bg-neutral-800 shadow h-12">
                <div class="grid grid-cols-3">
                    {{-- button hide sidebar --}}
                    <div class="col-span-1 grid justify-start  ">
                        <button onclick="hideSidebar()" class="hover:bg-black mx-3 m-2 "><i class="fa-solid fa-bars p-2 text-white"></i></button>
                    </div>
                    {{-- Profile --}}
                    <div class="col-span-2 grid justify-end  p-2.5">
                        <div class="space-x-5">
                            <i class="fa-solid fa-bell text-white"></i>
                            <span class="text-white">Moch Arif Rochmanullah</span>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="pt-5 pr-5 pl-10">
                @yield('content')
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function dropdown() {
            document.querySelector('#sub-menu').classList.toggle('hidden');
        }

        function hideSidebar() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        }
        dropdown()

    </script>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/fontawesome.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/fontawesome.js"></script>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/all.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/all.js"></script>
</body>
</html>
