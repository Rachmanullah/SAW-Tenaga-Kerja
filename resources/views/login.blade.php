<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login Arkit</title>
</head>
<body>
    <div class="h-screen flex items-center justify-center">
        <div class="p-8 rounded-lg shadow-lg max-w-sm w-100 bg-gray-700">
            <h1 class="text-center text-2xl font-TitilliumWeb-Regular mb-5 text-white">Login <span class="text-[#0B8F98]">Ar</span><span class="text-[#E7702D]">kit</span></h1>
            <form method="post" action="{{ route('login.check') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-yellow-50 font-TitilliumWeb-Bold mb-2" for="email">Email</label>
                    <input class="border border-gray-300 p-2 font-TitilliumWeb-Regular rounded-md @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Enter Your Email" autocomplete="off">
                    @error('email')
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <div>
                            <span class="font-TitilliumWeb-Bold">{{ $message }}!</span>
                        </div>
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-yellow-50 font-TitilliumWeb-Bold mb-2" for="password">Password</label>
                    <input class="border border-gray-300 p-2 font-TitilliumWeb-Regular rounded-md @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Enter Your Password" autocomplete="off">
                    @error('password')
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <div>
                            <span class="font-TitilliumWeb-Bold">{{ $message }}!</span>
                        </div>
                    </div>
                    @enderror
                </div>
                <button class="bg-blue-600 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-4 rounded w-full">
                    Sign In
                </button>
            </form>
        </div>
    </div>
</body>
</html>
