<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Aktivitas\AktivitasCreate;
use App\Livewire\Aktivitas\AktivitasRead;
use App\Livewire\Customer\CustomerData;
use App\Livewire\DashboardController;
use App\Livewire\Jadwal\JadwalCreate;
use App\Livewire\Jadwal\JadwalRead;
use App\Livewire\Laporan\LaporanRead;
use App\Livewire\Master\BahanMaterialController;
use App\Livewire\Master\TukangController;
use App\Livewire\Proyek\KegiatanController;
use App\Livewire\Proyek\ProyekCreate;
use App\Livewire\Proyek\ProyekRead;
use App\Livewire\Suplai\SuplaiCreate;
use App\Livewire\Suplai\SuplaiRead;
use App\Livewire\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class,'index'])->name('login');
Route::get('/login', [AuthController::class,'index']);

Route::post('/login', [AuthController::class,'login'])->name('auth.login');
Route::get('/logout', [AuthController::class,'logout'])->name('auth.logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',DashboardController::class)->name('dashboard');
    Route::get('/client',CustomerData::class)->name('customer');

    Route::get('/proyek',ProyekRead::class)->name('proyek');
    Route::get('/proyek/create',ProyekCreate::class)->name('proyek.create');
    Route::get('/proyek/edit/{id}',ProyekCreate::class)->name('proyek.edit');

    Route::get('/proyek/kegiatan/{id}',KegiatanController::class)->name('proyek.kegiatan');

    Route::get('/jadwal',JadwalRead::class)->name('jadwal');
    Route::get('/jadwal/create',JadwalCreate::class)->name('jadwal.create');

    Route::get('/aktivitas',AktivitasRead::class)->name('aktivitas');
    Route::get('/aktivitas/create',AktivitasCreate::class)->name('aktivitas.create');
    Route::get('/aktivitas/{id_aktivitas}/edit',AktivitasCreate::class)->name('aktivitas.edit');

    Route::get('/suplai',SuplaiRead::class)->name('suplai');
    Route::get('/suplai/create',SuplaiCreate::class)->name('suplai.create');
    Route::get('/suplai/edit/{id}',SuplaiCreate::class)->name('suplai.edit');

    Route::get('/master/tukang',TukangController::class)->name('master.tukang');
    Route::get('/master/bahan',BahanMaterialController::class)->name('master.bahan');

    Route::get('/master/user',UserController::class)->name('setting.user');


    Route::get('/laporan',LaporanRead::class)->name('laporan');
    Route::get('/laporan/jadwal/pdf',[LaporanRead::class,'pdfjadwal'])->name('laporan.jadwal.pdf');
    Route::get('/laporan/aktivitas/pdf',[LaporanRead::class,'pdfaktivitas'])->name('laporan.aktivitas.pdf');
    Route::get('/laporan/proyek/pdf',[LaporanRead::class,'pdfproyek'])->name('laporan.proyek.pdf');
    Route::get('/laporan/pemakaian/pdf',[LaporanRead::class,'pdfpemakaian'])->name('laporan.pemakaian.pdf');
    Route::get('/laporan/cpm/pdf',[LaporanRead::class,'pdfcpm'])->name('laporan.cpm.pdf');
});