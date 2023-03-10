<?php

use App\Http\Controllers\WebController\EmployeeManagementController;
use App\Http\Controllers\WebController\HomeController;
use App\Http\Controllers\WebController\WelcomeController;
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

Route::get('/', [welcomeController::class, 'getStart'])->name('start');

Auth::routes();

/* Ruta de inicio modulos internos */
Route::get('/home', [HomeController::class, 'index'])->name('home');


/* Rutas gestión empleados */
Route::get('/employee/management', [EmployeeManagementController::class, 'index'])->name('employee/management');
Route::get('/employee/create', [EmployeeManagementController::class, 'create']);
Route::post('/employee/store', [EmployeeManagementController::class, 'store']);
Route::get('/employee/edit/{employee}', [EmployeeManagementController::class, 'edit']);
Route::patch('/employee/update/{employee}', [EmployeeManagementController::class, 'update']);
Route::delete('/employee/destroy/{employee}', [EmployeeManagementController::class, 'destroy']);

/* Rutas empleado módulo */
Route::get('/employee/data', [\App\Http\Controllers\WebController\EmployeeController::class, 'show'])->name('employee/data');
