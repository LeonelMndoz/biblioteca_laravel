<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Inicio;
use App\Http\Livewire\Admin\Mostrar\ViewLibro;
use App\Http\Livewire\Admin\Mostrar\ViewUsuario;
use App\Http\Livewire\Admin\Agregar\AddUsuario;
use App\Http\Livewire\Admin\Agregar\AddPrestamo;
use App\Http\Livewire\Admin\Mostrar\MostrarLibros;
use App\Http\Livewire\Admin\Mostrar\MostrarPrestamos;
use App\Http\Livewire\Admin\Mostrar\MostrarEjemplares;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    
Route::get( 
    '/Inicio', 
    Inicio::class 
)->name('Agregar');

Route::get( 
    '/Mostrar/ViewUsuario', 
    ViewUsuario::class 
)->name('ViewUsuario');

Route::get( 
    '/Mostrar/MostrarLibros', 
    MostrarLibros::class 
)->name('MostrarLibros');

Route::get( 
    '/Agregar/AddUsuario', 
    AddUsuario::class 
)->name('AddUsuario');

Route::get( 
    '/Agregar/AddPrestamo', 
    AddPrestamo::class 
)->name('AddPrestamo');

Route::get( 
    '/Mostrar/MostrarPrestamos', 
    MostrarPrestamos::class 
)->name('MostrarPrestamos');

Route::get( 
    '/Mostrar/MostrarEjemplares', 
    MostrarEjemplares::class 
)->name('MostrarEjemplares');



});
