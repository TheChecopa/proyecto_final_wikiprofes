<?php

use App\Http\Controllers\PuntuacionController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\ProfesorController;
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

Route::get('/', [MainController::class, 'index'])->name('mainIndex');

Route::get('/calificacion', [CalificacionController::class, 'index'])->name('calificacionIndex');
Route::get('calificacion/view/{id}', [CalificacionController::class, 'view'])->name('calificacionView');
Route::get('/calificacion/create', [CalificacionController::class, 'create'])->name('calificacionCreate');
Route::post('/calificacion/store', [CalificacionController::class, 'store'])->name('calificacionStore');
Route::get('/calificacion/edit/{id}', [CalificacionController::class, 'edit'])->name('calificacionEdit');
Route::post('/calificacion/update/{id}', [CalificacionController::class, 'update'])->name('calificacionUpdate');
Route::get('/calificacion/delete/{id}', [CalificacionController::class, 'delete'])->name('calificacionDelete');

Route::get('/puntuaciones', [PuntuacionController::class, 'index'])->name('PuntuacionIndex');
Route::get('/puntuaciones/view/{id}', [PuntuacionController::class, 'view'])->name('PuntuacionView');
Route::get('/puntuaciones/create', [PuntuacionController::class, 'create'])->name('PuntuacionCreate');
Route::post('/puntuaciones/store', [PuntuacionController::class, 'store'])->name('PuntuacionStore');
Route::get('/puntuaciones/edit/{id}', [PuntuacionController::class, 'edit'])->name('PuntuacionEdit');
Route::post('/puntuaciones/update', [PuntuacionController::class, 'update'])->name('PuntuacionUpdate');
Route::get('/puntuaciones/delete/{id}', [PuntuacionController::class, 'delete'])->name('PuntuacionDelete');

Route::get('/profesores', [ProfesorController::class, 'index'])->name('profesorIndex');
Route::get('/profesores/view/{id}', [ProfesorController::class, 'view'])->name('profesorView');
Route::get('/profesores/create', [ProfesorController::class, 'create'])->name('profesorCreate');
Route::post('/profesores/store', [ProfesorController::class, 'store'])->name('profesorStore');
Route::get('/profesores/edit/{id}', [ProfesorController::class, 'edit'])->name('profesorEdit');
Route::post('/profesores/update/{id}', [ProfesorController::class, 'update'])->name('profesorUpdate');
Route::get('/profesores/delete/{id}', [ProfesorController::class, 'delete'])->name('profesorDelete');
Route::get('/profesores/{id}/viewMail', [ProfesorController::class, 'viewMail'])->name('profesorMailView');
Route::get('/profesores/{id}/sendMail', [ProfesorController::class, 'sendMail'])->name('profesorMail');

Route::get('/test', [OrdenController::class, 'test'])->name('test');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
