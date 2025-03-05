<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index'); // List user
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Form tambah user
Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Simpan user
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Form edit user
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); // Update user
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Hapus user
