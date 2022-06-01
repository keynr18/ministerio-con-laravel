<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Eventos;
use App\Http\Livewire\Productor;
use App\Http\Livewire\Observador;
use App\Http\Livewire\Haciendas;
use App\Http\Livewire\Producciones;
use App\Http\Livewire\RegistrarProductor;
use App\Http\Livewire\Buscar;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

//ruta para registrar el productor por medio de livewire
Route::get('/registro',RegistrarProductor::class)->name('registro');

// por esta ruta se identifica el rol del usuario para iniciar sesion
Route::get('/redirects',[HomeController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/admin', Eventos::class)->name('admin.home');
    Route::get('/admin/productores', Productor::class)->name('admin.pro');
    Route::get('/admin/productores/pdf', [Productor::class, 'pdf'])->name('pro.pdf');
    Route::get('/admin/personal', Observador::class)->name('admin.personal');
    Route::get('/admin/busqueda', Buscar::class)->name('admin.busqueda');
    Route::get('/admin/perfil',[ProductorController::class, 'index'])->name('admin.perfil');

    Route::get('/productor', Haciendas::class)->name('productor.home');
    Route::get('/productor/producciones',Producciones::class)->name('productor.produccion');
    Route::get('/productor/perfil',[ProductorController::class, 'index'])->name('productor.perfil');
});
