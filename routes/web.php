<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDetailController;

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

// Reference from https://www.digitalocean.com/community/tutorials/simple-laravel-crud-with-resource-controllers 


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/add-employee', [EmployeeController::class, 'create'])->name('employees.create');

Route::post('/add-employee', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');

Route::delete('/employees/{id}', [EmployeeController::class, 'delete'])->name('employees.delete');

Route::get('/employee-details', [EmployeeDetailController::class, 'index'])->name('employee_details.index');

