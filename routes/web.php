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
use App\Http\Livewire\Roles\Crear;
use App\Http\Livewire\Roles\Mostrar;
use App\Http\Livewire\RolesYPermisos\Crear as CrearRolesYPermisos;

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
)->middleware('can:Agregar libro')->name('Agregar');

Route::get( 
    '/Mostrar/ViewUsuario', 
    ViewUsuario::class 
)->middleware('can:Mostrar Usuarios')->name('ViewUsuario');

Route::get( 
    '/Mostrar/MostrarLibros', 
    MostrarLibros::class 
)->middleware('can:Mostrar Libros')->name('MostrarLibros');

Route::get( 
    '/Agregar/AddUsuario', 
    AddUsuario::class 
)->middleware('can:Agregar Usuario')->name('AddUsuario');

Route::get( 
    '/Agregar/AddPrestamo', 
    AddPrestamo::class 
)->middleware('can:Agregar Prestamo')->name('AddPrestamo');

Route::get( 
    '/Mostrar/MostrarPrestamos', 
    MostrarPrestamos::class 
)->middleware('can:Mostrar Prestamos')->name('MostrarPrestamos');

Route::get( 
    '/Mostrar/MostrarEjemplares', 
    MostrarEjemplares::class 
)->middleware('can:Mostrar Ejemplares')->name('MostrarEjemplares');

Route::get( 
    '/Roles/Crear', 
    Crear::class 
)->middleware('can:Mostrar Prestamos')->name('Crear');

Route::get( 
    '/Roles/Mostrar', 
    Mostrar::class 
)->middleware('can:Mostrar Prestamos')->name('Mostrar');

Route::get( 
    '/RolesYPermisos/Crear', 
    CrearRolesYPermisos::class 
)->middleware('can:Mostrar Prestamos')->name('CrearRolesYPermisos');



});
