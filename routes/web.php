<?php

use App\Http\Livewire\CrudConceptomov;
use App\Http\Livewire\CrudDependencia;
use App\Http\Livewire\Empresa\CrudEmpresa;
use App\Http\Livewire\CrudEspecialidad;
use App\Http\Livewire\CrudGrupoasesores;
use App\Http\Livewire\CrudOcupacion;
use App\Http\Livewire\CrudPapeleria;
use App\Http\Livewire\CrudParentesco;
use App\Http\Livewire\CrudTipoasesor;
use App\Http\Livewire\CrudTipocontrato;
use App\Http\Livewire\CrudTipopapeleria;
use App\Http\Livewire\CrudTipoplan;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hola', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/concepto', CrudConceptomov::class)->name('concepto');
Route::middleware(['auth:sanctum', 'verified'])->get('/dependeicia', CrudDependencia::class)->name('dependencia');
Route::middleware(['auth:sanctum', 'verified'])->get('/parentesco', CrudParentesco::class)->name('parentesco');
Route::middleware(['auth:sanctum', 'verified'])->get('/ocupacion', CrudOcupacion::class)->name('ocupacion');
Route::middleware(['auth:sanctum', 'verified'])->get('/especialidad', CrudEspecialidad::class)->name('especialidad');
Route::middleware(['auth:sanctum', 'verified'])->get('/empresa', CrudEmpresa::class)->name('empresa');
Route::middleware(['auth:sanctum', 'verified'])->get('/tipoasesor', CrudTipoasesor::class)->name('tipoasesor');
Route::middleware(['auth:sanctum', 'verified'])->get('/grupoasesor', CrudGrupoasesores::class)->name('grupoasesor');
Route::middleware(['auth:sanctum', 'verified'])->get('/tipocontrato', CrudTipocontrato::class)->name('tipocontrato');
Route::middleware(['auth:sanctum', 'verified'])->get('/tipopapeleria', CrudTipopapeleria::class)->name('tipopapeleria');
Route::middleware(['auth:sanctum', 'verified'])->get('/tipoplan', CrudTipoplan::class)->name('tipoplan');

Route::middleware(['auth:sanctum', 'verified'])->get('/papeleria', CrudPapeleria::class)->name('papeleria');

