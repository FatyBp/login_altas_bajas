<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\clientes;
use App\Http\Controllers\Datos;
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


Route::get('/create',[Datos::class,'create']);
Route::post('/store',[Datos::class,'store']);
Route::get('/edit/{id}', [Datos::class, 'edit'])->name('edit');
Route::put('update/{id}', [Datos::class, 'update'])->name('update');
Route::get('/show/{id}',[Datos::class,'show'])->name('show');
Route::delete('/destroy/{id}',[Datos:: class, 'destroy'])->name('destroy');
Route::get('/',[AuthController::class, 'login'])->name('auth-login');
Route::get('/usuarioNuevo',[AuthController::class,'agregarNuevo']);
Route::post('/logear', [AuthController::class, 'logear'])->name('logear'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); 
Route::get('/index',[clientes::class, 'index'])->name('index');


