<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/', 'pre-registro.index')->name('programasAcademicos');
Route::view('/solicitud/maestria', 'postulacion.maestria-ciencias-ambientales')->name('maestria');
Route::view('/solicitud/doctorado', 'postulacion.doctorado-ciencias-ambientales')->name('doctorado');
Route::view('/solicitud/enrem', 'postulacion.enrem')->name('enrem');
Route::view('/solicitud/imarec', 'postulacion.imarec')->name('imarec');



Route::view('/entrevistas', 'entrevistas.index')->name('entrevistas.index');