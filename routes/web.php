<?php
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

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\StrukturalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/list', [PegawaiController::class, 'index']);
    Route::prefix('pegawai')->group(function () {
        Route::get('hapus/{id}', [PegawaiController::class, 'hapus']);
        Route::get('profile/{id}', [PegawaiController::class, 'profile']);
        Route::post('tambah', [PegawaiController::class, 'create']);
        Route::get('cetak', [PegawaiController::class, 'cetak']);
        Route::get('cetak_profil/{id}', [PegawaiController::class, 'cetakProfile']);
        Route::get('export', [PegawaiController::class, 'export']);

        Route::get('tmagama/tambah', [AgamaController::class, 'index']);
        Route::get('tmagama/hapus/{id}', [AgamaController::class, 'hapus']);
        Route::post('tmagama/tambah/proses', [AgamaController::class, 'create']);

        Route::get('tmgolongan/tambah', [GolonganController::class, 'index']);
        Route::get('tmgolongan/hapus/{id}', [GolonganController::class, 'hapus']);
        Route::post('tmgolongan/tambah/proses', [GolonganController::class, 'create']);

        Route::get('tmjabatans/tambah', [StrukturalController::class, 'index']);
        Route::get('tmjabatans/hapus/{id}', [StrukturalController::class, 'hapus']);
        Route::post('tmjabatans/tambah/proses', [StrukturalController::class, 'create']);
    });
    Route::prefix('profile')->group(function () {
        // Route::get('{id}', PegawaiController::class, 'profil');
    });
});
