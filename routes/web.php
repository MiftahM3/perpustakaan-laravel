<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\Petugas\BukuController as PetugasBukuController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\Rule\Parameters;

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

Route::get('/', function(){
    return view('welcome');
})->middleware('auth');


//hanya bisa di akses admin dan petugas
Route::middleware(['auth','only_petugas'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori/store', [KategoriController::class, 'store']);
    Route::get('/kategori/{id}', [KategoriController::class, 'edit']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::get('/kategori/{id}', [KategoriController::class, 'destroy']);

    Route::get('/rak', [RakController::class, 'index']);
    Route::post('/rak/store', [RakController::class, 'store']);
    Route::get('/rak/{id}', [RakController::class, 'edit']);
    Route::put('/rak/{id}', [RakController::class, 'update']);
    Route::get('/rak/{id}', [RakController::class, 'destroy']);


    Route::get('/penerbit', [PenerbitController::class, 'index']);
    Route::post('/penerbit/store', [PenerbitController::class, 'store']);
    Route::get('/penerbit/{id}', [PenerbitController::class, 'edit']);
    Route::put('/penerbit/{id}', [PenerbitController::class, 'update']);
    Route::get('/penerbit/{id}', [PenerbitController::class, 'destroy']);

    Route::get('/buku', [BukuController::class, 'index']);
    Route::post('/buku/store', [BukuController::class, 'store']);
    Route::get('/buku/{id}', [BukuController::class, 'edit']);
    Route::put('/buku/{id}', [BukuController::class, 'update']);
    Route::get('/buku/{id}', [BukuController::class, 'destroy']);


    Route::get('/DataPeminjaman', [PeminjamanController::class, 'dataPeminjaman']);
    Route::get('/DataPengembalian', [PeminjamanController::class, 'dataPengembalian']);
    Route::get('/ubahStatus/{id}', [PeminjamanController::class, 'ubahStatus']);
    Route::get('/ubahStatus1/{id}', [PeminjamanController::class, 'ubahStatus1']);
    Route::get('/laporan', [PeminjamanController::class, 'laporan'])->name('laporan');

});

//hanya bisa di akses admin
Route::middleware(['auth','only_admin'])->group(function () {

    Route::get('/daftar-user', [UserController::class, 'index']);
    Route::post('/daftar-user/store', [UserController::class, 'store']);
    Route::get('/daftar-user/{id}', [UserController::class, 'edit']);
    Route::put('/daftar-user/{id}', [UserController::class, 'update']);
    Route::get('/daftar-user/{id}', [UserController::class, 'destroy']);
    
});

Route::middleware(['auth'])->group(function () {

    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('/batal/{id}', [PeminjamanController::class, 'deletePeminjaman'])->name('batal');
});



Route::middleware(['auth','only_peminjam'])->group(function () {

    Route::get('/detailPinjam', [PeminjamController::class, 'detailPinjam']);
    Route::get('/pinjamBuku/{id}', [PeminjamController::class, 'pinjamBuku']);
    Route::get('/favorit/{id}', [PeminjamController::class, 'favorit']);
    Route::get('/favorit', [PeminjamController::class, 'favorits']);
    Route::get('/deleteFav/{id}', [PeminjamController::class, 'deleteFavorit']);
    Route::get('/home', [PeminjamController::class, 'index']);
    Route::get('/pilih-kategori/{id}/{nama}', [PeminjamController::class, 'pilihBuku']);
    Route::get('/pilih-penerbit/{id}/{nama}', [PeminjamController::class, 'pilihPenerbit']);
});

//hanya bisa di akses guest
Route::middleware(['only_guest'])->group(function () {
Route::get('/', [PengunjungController::class, 'tampilDepan'])->name('home');

    Route::get('/', [PengunjungController::class, 'tampilDepan'])->name('home');
    Route::get('/daftar-kategori/{id}', [PengunjungController::class, 'pilihBuku'])->name('pilihBuku');
    Route::get('/daftar-penerbit/{id}', [PengunjungController::class, 'pilihPenerbit'])->name('pilihPenerbit');

    Route::get('login', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProses']);
});