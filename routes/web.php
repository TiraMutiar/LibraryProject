<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PinjamBukuController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/user', [HalamanController::class, 'ini']);
Route::post('/user', [AuthController::class, 'index']);
Route::get('/', [AuthController::class, 'indexx'])->name('login');

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registered']);
Route::post('/ceklogin',[AuthController::class, 'ceklogin']);

Route::middleware('auth')->group(function(){

    Route::get('/kategori',[KategoriController::class, 'index']);
    Route::post('/kategori',[KategoriController::class, 'kategori']);
    Route::get('/lihatkategori', [KategoriController::class, 'indexx']);
    Route::get('/kategoris/edit/{id}', [KategoriController::class, 'edit']);

    Route::get('/buku', [BukuController::class, 'index']);
    Route::post('/buku', [BukuController::class, 'data']);
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
    Route::post('/ubahbuku/{id}', [BukuController::class, 'ubah']);
    Route::get('/lihatbuku', [BukuController::class, 'indexx']);

    Route::get('/penerbit', [PenerbitController::class, 'index']);
    Route::post('/penerbit', [PenerbitController::class, 'data']);
    Route::get('/lihatpenerbit', [PenerbitController::class, 'indexx']);

    Route::get('/penerbit/edit/{id}', [PenerbitController::class, 'edit']);
    Route::get('/peminjam/edit/{id}', [PeminjamController::class, 'edit']);
    Route::get('/pengelola/edit/{id}', [UserController::class, 'edit']);

    Route::post('/ubahpenerbit/{id}', [PenerbitController::class, 'ubah']);
    Route::post('/ubahpeminjam/{id}', [PeminjamController::class, 'ubah']);
    Route::post('/ubahkategori/{id}', [KategoriController::class, 'ubah']);
    Route::post('/ubahuser/{id}', [UserController::class, 'ubah']);

    Route::get('/indexbuku', [BukuController::class, 'indexx']);
    Route::get('/indexkategori', [KategoriController::class, 'indexx']);
    Route::get('/indexpenerbit', [PenerbitController::class, 'indexx']);
    Route::get('/indexpeminjam', [PeminjamController::class, 'indexx']);
    Route::get('/indexuser', [UserController::class, 'indexx']);

    Route::get('/tambahkategori', [KategoriController::class, 'index']);
    Route::get('/tambahbuku', [BukuController::class, 'index']);
    Route::get('/tambahpenerbit', [PenerbitController::class,'index']);
    Route::get('/tambahpeminjam', [PeminjamController::class, 'index']);
    Route::get('/tambahuser', [UserController::class, 'index']);

    Route::post('/peminjam', [PeminjamController::class, 'data']);
    Route::post('/pengelola', [UserController::class, 'data']);

    Route::get('/hapuskategori/{id}', [KategoriController::class, 'hapus']);
    Route::get('/hapuspeminjam/{id}', [PeminjamController::class, 'hapus']);
    Route::get('/hapuspenerbit/{id}', [PenerbitController::class, 'hapus']);
    Route::get('/hapusbuku/{id}', [BukuController::class, 'hapus']);
    Route::get('/hapuspengelola/{id}', [UserController::class, 'hapus']);

    Route::get('/pinjambuku', [PinjamBukuController::class, 'index']);
    
    Route::get('/logout', [AuthController::class, 'logout']);
});
