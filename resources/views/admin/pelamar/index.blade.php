@extends('admin.header')
@section('content')
<div class="container">
    <div class="text-3xl">
        <h1><i class="fa-solid fa-user-plus"></i> Data Pelamar</h1>
    </div>
    <button class="bg-blue-600 mt-5 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-12 rounded w-50">
        Add
    </button>
    <div class="relative overflow-x-auto shadow-md mt-5 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Registration Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        1
                    </td>
                    <td class="px-6 py-4">
                        Dasuki Abdullah
                    </td>
                    <td class="px-6 py-4">
                        Dasuki@gmail.com
                    </td>
                    <td class="px-6 py-4">
                        085967162716

                    </td>
                    <td class="px-6 py-4x space-x-3">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        2
                    </td>
                    <td class="px-6 py-4">
                        Moch Yusuf
                    </td>
                    <td class="px-6 py-4">
                        yusuf87@gmail.com
                    </td>
                    <td class="px-6 py-4">
                        085967162715
                    </td>
                    <td class="px-6 py-4x space-x-3">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        3
                    </td>
                    <td class="px-6 py-4">
                        Moch Arif Rochmanullah
                    </td>
                    <td class="px-6 py-4">
                        rachmanullah1@gmail.com
                    </td>
                    <td class="px-6 py-4">
                        085967162714
                    </td>
                    <td class="px-6 py-4x space-x-3">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
