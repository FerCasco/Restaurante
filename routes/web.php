<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Menu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\CheckRole;
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

Route::get('lang/{lang}',[LanguageController::class, 'switchLang'])->name('lang');

Route::view('/', 'principal')->name('home');
Route::view('/inicio', 'welcome')->name('welcome');
Route::view('/cocina', 'cocina-plantilla');
Route::view('/inventario', 'inventario-plantilla')->middleware(CheckRole::class . ':admin');
Route::view('/contactos', 'contactos-plantilla')->middleware(CheckRole::class . ':admin');
Route::view('/contacto/{email}', 'ver-contacto')->name('verContacto');
Route::view('/graficas', 'graficas-plantilla');
Route::view('/datosAlmacenados', 'datosAlmacenados-plantilla');
Route::view('login','login-plantilla');
Route::view('users','users');

//Route::view('iniciarSesion/{idTrabajador}', [App\Http\Controllers\Auth\LoginController::class, 'showQr'])->name('iniciarSesionTrabajador');
Route::get('/db', [App\Http\Controllers\ProductoController::class, 'show'])->name('preciosProductos');
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
