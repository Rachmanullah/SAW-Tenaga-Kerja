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
    {{-- navbar --}}
    <nav class="navbar left-0 fixed right-0 top-0 bg-slate-800 shadow h-12 items-end">
        <div class="grid grid-cols-3 gap-4 ">
            <div class="pr-5 place-self-start">
                <img class="block ml-5 h-12 w-auto" src="http://127.0.0.1:8000/assets/image/logoArkit2.png" alt="Your Company">
            </div>
            <div class="p-2 col-start-2 ">
                <ul class="space-x-5 flex justify-center">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'underline decoration-emerald-400' : null }} text-slate-200 font-TitilliumWeb-Regular hover:underline">Home</a></li>
                    <li><a href="#" class="{{ request()->routeIs('about') ? 'underline decoration-emerald-400' : null }} text-slate-200 font-TitilliumWeb-Regular hover:underline">About</a></li>
                    <li><a href="{{ route('lowongan') }}" class="{{ request()->routeIs('lowongan') ? 'underline decoration-emerald-400' : null }} text-slate-200 font-TitilliumWeb-Regular hover:underline">Lowongan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="pt-12">
        @yield('content')
    </div>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/fontawesome.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/fontawesome.js"></script>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/all.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/fontawesome/js/all.js"></script>
</body>
</html>
