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
use App\Http\Controllers\FungsionalController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RiwayatJabatanController;
use App\Http\Controllers\RiwayatJabatanStrukturalController;
use App\Http\Controllers\RiwayatJabatanTambahanController;
use App\Http\Controllers\StrukturalController;
use App\Http\Controllers\TambahanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'PegawaiController@home')->name('home');
    Route::get('/list', [PegawaiController::class, 'index']);
    Route::prefix('pegawai')->group(function () {
        Route::get('/', [PegawaiController::class, 'home']);
        Route::get('/grafik', [GrafikController::class, 'index']);
        Route::get('hapus/{id}', [PegawaiController::class, 'hapus']);
        Route::post('tambah', [PegawaiController::class, 'create']);
        Route::post('edit/{id}', [PegawaiController::class, 'edit']);
        Route::get('cetak', [PegawaiController::class, 'cetak']);
        Route::get('cetak_profil/{id}', [PegawaiController::class, 'cetakProfile']);
        Route::get('export', [PegawaiController::class, 'export']);
        Route::post('import', [PegawaiController::class, 'import']);

        Route::get('profile/{id}', [PegawaiController::class, 'profile']);
        Route::post('jabatan/tambah', [RiwayatJabatanController::class, 'tambah']);
        Route::get('jabatan/editpage/{id1}', [RiwayatJabatanController::class, 'editpage']);
        Route::post('jabatan/edit/{id}', [RiwayatJabatanController::class, 'edit']);

        Route::post('jabatans/tambah', [RiwayatJabatanStrukturalController::class, 'tambah']);
        Route::get('jabatans/editpage/{id1}', [RiwayatJabatanStrukturalController::class, 'editpage']);
        Route::post('jabatans/edit/{id}', [RiwayatJabatanStrukturalController::class, 'edit']);

        Route::post('jabatant/tambah', [RiwayatJabatanTambahanController::class, 'tambah']);
        Route::get('jabatant/editpage/{id1}', [RiwayatJabatanTambahanController::class, 'editpage']);
        Route::post('jabatant/edit/{id}', [RiwayatJabatanTambahanController::class, 'edit']);

        Route::get('tmagama/tambah', [AgamaController::class, 'index']);
        Route::get('tmagama/hapus/{id}', [AgamaController::class, 'hapus']);
        Route::post('tmagama/tambah/proses', [AgamaController::class, 'create']);

        Route::get('tmgolongan/tambah', [GolonganController::class, 'index']);
        Route::get('tmgolongan/hapus/{id}', [GolonganController::class, 'hapus']);
        Route::post('tmgolongan/tambah/proses', [GolonganController::class, 'create']);

        Route::get('tmjabatans/tambah', [StrukturalController::class, 'index']);
        Route::get('tmjabatans/hapus/{id}', [StrukturalController::class, 'hapus']);
        Route::post('tmjabatans/tambah/proses', [StrukturalController::class, 'create']);

        Route::get('tmjabatanf/tambah', [FungsionalController::class, 'index']);
        Route::get('tmjabatanf/hapus/{id}', [FungsionalController::class, 'hapus']);
        Route::post('tmjabatanf/tambah/proses', [FungsionalController::class, 'create']);

        Route::get('tmjabatanft/tambah', [TambahanController::class, 'index']);
        Route::get('tmjabatanft/hapus/{id}', [TambahanController::class, 'hapus']);
        Route::post('tmjabatanft/tambah/proses', [TambahanController::class, 'create']);
    });
    Route::prefix('profile')->group(function () {
        // Route::get('{id}', PegawaiController::class, 'profil');
    });
});
