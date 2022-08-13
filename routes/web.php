<?php

use App\Http\Controllers\Admin\{ DesaController, KandidatController, KecamatanController, TpsController};
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function(){
    Route::prefix('wilayah')->group(function(){
        Route::resource('kecamatan', KecamatanController::class);
        Route::resource('desa', DesaController::class);
        Route::get('get-desa/{id}', [DesaController::class, 'getDesaByIdKecamatan'])->name('get.desa');

        Route::resource('tps', TpsController::class);
    });
    
    Route::resource('kandidat', KandidatController::class);
});
