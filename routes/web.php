<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\is_Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//route utama
Route::get('/', function () {
    return view('index');
})->name('home');

//route about
Route::get('/about', function () {
    return view('admin.layout');
})->name('about');

//route lowongan
Route::get('/lowongan', [LowonganController::class, 'tampilkan'])->name('lowongan');

//route daftar lowongan
route::controller(DaftarController::class)->group(function () {
    route::get('/daftar/{id}', 'daftar')->name('daftar');
    route::post('/daftar/store', 'store')->name('daftar.store');
});


//route halaman login admin
route::get('/admin/login', function () {
    if (Auth::check()) {
        return redirect('/admin/home');
    }
    return view('login');
})->name('login');

//login
route::post('/login', [AuthController::class, 'login'])->name('login.check');

route::middleware([is_Auth::class])->group(function () {
    //logout
    route::get('/admin/logout/{id}', [AuthController::class, 'logout'])->name('logout');
    //route admin
    route::get('/admin/home', [DashboardController::class, 'adminDashboard'])->name('dashboard');

    //route data user
    Route::controller(UserController::class)->group(function () {
        route::get('/admin/user', 'index')->name('data.user');
        route::post('/admin/user/store', 'store')->name('user.store');
        route::put('/admin/user/update', 'update')->name('user.update');
        route::get('/admin/user/delete/{id}', 'destroy')->name('user.delete');
    });
    //route data divisi
    Route::controller(DivisiController::class)->group(function () {
        route::get('/admin/divisi', 'index')->name('data.divisi');
        route::post('/admin/divisi/store', 'store')->name('divisi.store');
        route::put('/admin/divisi/update', 'update')->name('divisi.update');
        route::get('/admin/divisi/delete/{id}', 'destroy')->name('divisi.delete');
    });

    //route data role
    Route::controller(RoleController::class)->group(function () {
        route::get('/admin/role', 'index')->name('data.role');
        route::post('/admin/role/store', 'store')->name('role.store');
        route::put('/admin/role/update', 'update')->name('role.update');
    });

    //route data pelamar
    Route::controller(PelamarController::class)->group(function () {
        route::get('/admin/pelamar', 'index')->name('data.pelamar');
    });

    //route data lowongan
    route::controller(LowonganController::class)->group(function () {
        route::get('/admin/lowongan', 'index')->name('data.lowongan');
        route::post('/admin/lowongan/store', 'store')->name('lowongan.store');
        route::put('/admin/lowongan/update', 'update')->name('lowongan.update');
        route::get('/admin/lowongan/delete/{id}', 'destroy')->name('lowongan.delete');
    });

    //route data penilaian
    route::controller(PenilaianController::class)->group(function(){
        route::get('/admin/penilaian','index')->name('data.penilaian');
        route::get('/admin/penilaian/{id}','view')->name('penilaian.view');
    });

    //route data kriteria
    route::controller(KriteriaController::class)->group(function () {
        route::get('/admin/kriteria', 'index')->name('data.kriteria');
        route::post('/admin/kriteria/store', 'store')->name('kriteria.store');
        route::put('/admin/kriteria/update', 'update')->name('kriteria.update');
        route::get('/admin/kriteria/delete/{id}', 'destroy')->name('kriteria.delete');
    });

    //route data sub kriteria
    route::controller(SubKriteriaController::class)->group(function () {
        route::get('/admin/subKriteria', 'index')->name('data.subKriteria');
        route::post('admin/subKriteria/addOpsi', 'addOpsi')->name('subkriteria.storeOpsi');
        route::get('/admin/subKriteria/delete/{id}', 'destroy')->name('subKriteria.delete');
    });
});
