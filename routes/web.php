<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

//mostrar
Route::get('projects', [ProjectController::class, 'getAllProjects']);

//insertar
Route::get('insert', [ProjectController::class, 'insertProject']);
Route::get('insertar', [ProjectController::class, 'insertProject3']);

//actualizar
Route::get('actualizar', [ProjectController::class, 'updateProject']);

//eliminar
Route::get('eliminar', [ProjectController::class, 'destroy']);
