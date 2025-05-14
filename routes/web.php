<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswacontroller;
use App\Http\Controllers\dosencontroller;
use App\Http\Controllers\dashboardcontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/dashboard', [dashboardcontroller::class, 'index'])->name('dashboard');

Route::resource('mahasiswa', mahasiswacontroller::class);
Route::resource('dosen', dosencontroller::class);