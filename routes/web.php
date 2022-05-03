<?php

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

Route::get('/', function () {
    if (auth()->user()) {
        return view('dashboard');
    } else {
        return view('auth.login');
    }
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('users', 'users')->name('users');
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('quotes', 'quotes')->name('quotes');
    Route::view('hardware-pickup', 'hardwarepickup')->name('hardwarepickup');
    Route::view('vendor', 'vendor')->name('vendor');

    Route::get('/dashboard/{task}', App\Http\Livewire\Dashboard\ViewTask\Main::class)->name('dashboard.show');
    Route::get('/dashboard/{task}/update', App\Http\Livewire\Dashboard\UpdateTask\Main::class)->name('dashboard.update');
});
