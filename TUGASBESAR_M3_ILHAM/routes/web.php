<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

Route::get('/', [PesananController::class, 'index'])->name('pesanan.index');
Route::post('/', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/edit/{id}', [PesananController::class, 'edit'])->name('pesanan.edit');
Route::post('/edit/{id}', [PesananController::class, 'update'])->name('pesanan.update');
Route::get('/hapus/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');