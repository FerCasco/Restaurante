<?php

use App\Http\Controllers\ProfileController;
use App\Models\Mesa;
use App\Models\Producto;
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

Route::get('/users', function () {
    return view('users');
});


Route::get('/login', function () {
    return view('login');
});



//Rutas de vista principal para Livewire
Route::get('/principal', function () {
    return view('principal');
});


Route::get('/principal/terraza', function () {
    return view('partials.mesas',[
        'mesas' => Mesa::where('idSala','1')->get()
    ]);
});
Route::get('/principal/comedor', function () {
    return view('partials.mesas',[
        'mesas' => Mesa::where('idSala','2')->get()
    ]);
});
Route::get('/principal/barra', function () {
    return view('partials.mesas',[
        'mesas' => Mesa::where('idSala','3')->get()
    ]);
});






//Rutas de vista Productos para Livewire
Route::get('/productos/{idMesa}', function () {
    return view('productos');
}); 

Route::get('/productos/{idMesa}/bebidas', function () {
    return view('partials.productos',[
        'productos' => Producto::where('idFamilia','1')->get()
    ]);
});

Route::get('/productos/{idMesa}entrantes', function () {
    return view('partials.productos',[
        'productos' => Producto::where('idFamilia','2')->get()
    ]);
});






Route::get('/graficas', function () {
    return view('graficas');
});

Route::get('/pruebalivewire', function () {
    return view('prubaLivewire');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/salas', \App\Http\Livewire\Sala::class, 'render')->name('misSalas');
Route::get('/mesas/{id}', \App\Http\Livewire\Mesa::class)->name('misMesas');
