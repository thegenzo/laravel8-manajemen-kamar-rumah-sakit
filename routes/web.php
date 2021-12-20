<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\RekamMedisController;

use App\Http\Controllers\DiagnosaAnakController;
use App\Http\Controllers\PasienAnakController;
use App\Http\Controllers\RekamMedisAnakController;
use App\Http\Controllers\AntrianAnakController;


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
Route::view('/', 'pages.home');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'ceklevel:admin,perawat']], function() {

    
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('kamar', KamarController::class);
    Route::get('/kamar/lihat-pasien/{id}', [KamarController::class, 'lihatPasien'])->name('lihat-pasien');

    Route::resource('admin', AdminController::class);

    Route::resource('perawat', PerawatController::class);

    Route::resource('dokter', DokterController::class);

    Route::resource('antrian', AntrianController::class);

    // ------------- PASIEN DEWASA ------------------- //
    Route::resource('pasien', PasienController::class);
    Route::get('/laporan-pasien-masuk', [PasienController::class, 'laporanPasienMasuk']);
    Route::get('/laporan-pasien-keluar', [PasienController::class, 'laporanPasienKeluar']);

    Route::get('/rekam-medis/{id}', [RekamMedisController::class, 'index'])->name('rekam-medis');

    Route::post('/rekam-medis/{id}', [RekamMedisController::class, 'store']);

    Route::get('/diagnosa/{id}', [DiagnosaController::class, 'create'])->name('diagnosa');

    Route::post('/diagnosa/{id}', [DiagnosaController::class, 'store']);

    Route::get('/pasien-keluar', [DiagnosaController::class, 'index']);

    // ------------- PASIEN ANAK-ANAK ------------------- //
    Route::resource('pasien-anak', PasienAnakController::class);
    Route::get('/laporan-pasien-masuk-anak', [PasienAnakController::class, 'laporanPasienMasukAnak']);
    Route::get('/laporan-pasien-keluar-anak', [PasienAnakController::class, 'laporanPasienKeluarAnak']);

    Route::get('/rekam-medis-anak/{id}', [RekamMedisAnakController::class, 'index'])->name('rekam-medis-anak');

    Route::post('/rekam-medis-anak/{id}', [RekamMedisAnakController::class, 'store']);

    Route::get('/diagnosa-anak/{id}', [DiagnosaAnakController::class, 'create'])->name('diagnosa-anak');

    Route::post('/diagnosa-anak/{id}', [DiagnosaAnakController::class, 'store']);

    Route::get('/pasien-keluar-anak', [DiagnosaAnakController::class, 'index']);

    Route::resource('antrian-anak', AntrianAnakController::class);

    
});
