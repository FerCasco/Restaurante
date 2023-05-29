<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Menu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

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

Route::view('/', 'principal');
Route::view('/inicio', 'welcome');
Route::view('/cocina', 'cocina-plantilla');
Route::view('/inventario', 'inventario-plantilla');
Route::view('/contactos', 'contactos-plantilla');
Route::view('/contacto/{email}', 'ver-contacto')->name('verContacto');
Route::view('/graficas', 'graficas-plantilla');
Route::view('/datosAlmacenados', 'datosAlmacenados-plantilla');

Route::get('/db', [App\Http\Controllers\ProductoController::class, 'show'])->name('preciosProductos');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
