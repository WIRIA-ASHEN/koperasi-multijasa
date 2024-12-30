<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamanController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BayarPinjamanController;



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

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::get('/tambah-anggota', [AnggotaController::class, 'tambah']);
    Route::post('/anggota-store', [AnggotaController::class, 'store']);
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
    Route::post('/anggota-update/{id}', [AnggotaController::class, 'update']);
    Route::get('/anggota-hapus/{id}', [AnggotaController::class, 'hapus']);

    Route::get('/simpanan', [SimpananController::class, 'index']);
    Route::get('/tambah-simpanan', [SimpananController::class, 'tambah']);
    Route::post('/simpanan-store', [SimpananController::class, 'store']);
    Route::get('/simpanan/edit/{id}', [SimpananController::class, 'edit']);
    Route::post('/simpanan-update/{id}', [SimpananController::class, 'update']);
    Route::get('/simpanan-hapus/{id}', [SimpananController::class, 'hapus']);
    
    Route::get('/pinjaman', [PinjamanController::class, 'index']);
    Route::get('/tambah-pinjaman', [PinjamanController::class, 'tambah']);
    Route::post('/pinjaman-store', [PinjamanController::class, 'store']);
    Route::get('/pinjaman/edit/{id}', [PinjamanController::class, 'edit']);
    Route::post('/pinjaman-update/{id}', [PinjamanController::class, 'update']);
    Route::get('/pinjaman-hapus/{id}', [PinjamanController::class, 'hapus']);
    Route::get('/cetak/pinjaman/{id}', [PinjamanController::class, 'cetak']);
    Route::get('/cetak-pinjaman/{id}', [PinjamanController::class, 'cetak_pdf']);


    Route::get('/bayar-pinjaman', [BayarPinjamanController::class, 'index']);
    Route::get('/bayar-pinjaman/bayar/{id}', [BayarPinjamanController::class, 'bayar']);
    Route::post('/bayar-pinjaman/tagihan/{id}', [BayarPinjamanController::class, 'tagihan']);
    Route::get('/bayar-pinjaman/hapus/{id}', [BayarPinjamanController::class, 'hapus']);
    Route::get('/bayar-pinjaman/search', [BayarPinjamanController::class, 'search'])->name('bayar-pinjaman.search');

    Route::get('/laporan', [TransactionController::class, 'index']);
    Route::get('/laporan-pinjamans', [TransactionController::class, 'index_pinjaman']);
    Route::get('/laporan-angsurans', [TransactionController::class, 'index_angsuran']);
    Route::get('/laporan-simpanan', [TransactionController::class, 'export_simpanan']);
    Route::get('/laporan-pinjaman', [TransactionController::class, 'export_pinjaman']);
    Route::get('/laporan-angsuran', [TransactionController::class, 'export_angsuran']);
    
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/tambah-user', [UserController::class, 'tambah']);
    Route::post('/user-store', [UserController::class, 'store']);
    Route::get('/user-edit/{id}', [UserController::class, 'edit']);
    Route::post('/user-update/{id}', [UserController::class, 'update']);
    Route::get('/user-hapus/{id}', [UserController::class, 'hapus']);
    

});
