<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('reporte1-pdf', [App\Http\Livewire\Reporte1::class, 'pdf'])->name('reporte1-pdf');
Route::get('reporte2-pdf', [App\Http\Livewire\Reporte2::class, 'pdf'])->name('reporte2-pdf');
Route::get('reporte3-pdf', [App\Http\Livewire\Reporte3::class, 'pdf'])->name('reporte3-pdf');
Route::get('reporte4-pdf', [App\Http\Livewire\Reporte4::class, 'pdf'])->name('reporte4-pdf');
Route::get('reporte5-pdf', [App\Http\Livewire\Reporte5::class, 'pdf'])->name('reporte5-pdf');
//Route Hooks - Do not delete//
	Route::view('alquilers', 'livewire.alquilers.index')->middleware('auth');
	Route::view('actorpeliculas', 'livewire.actorpeliculas.index')->middleware('auth');
	Route::view('peliculas', 'livewire.peliculas.index')->middleware('auth');
	Route::view('generos', 'livewire.generos.index')->middleware('auth');
	Route::view('directores', 'livewire.directores.index')->middleware('auth');
	Route::view('formatos', 'livewire.formatos.index')->middleware('auth');
	Route::view('socios', 'livewire.socios.index')->middleware('auth');
	Route::view('actores', 'livewire.actores.index')->middleware('auth');
	Route::view('sexos', 'livewire.sexos.index')->middleware('auth');
	Route::view('reporte1', 'livewire.reporte1.index')->middleware('auth');
	Route::view('reporte2', 'livewire.reporte2.index')->middleware('auth');
	Route::view('reporte3', 'livewire.reporte3.index')->middleware('auth');
	Route::view('reporte4', 'livewire.reporte4.index')->middleware('auth');
	Route::view('reporte5', 'livewire.reporte5.index')->middleware('auth');
	