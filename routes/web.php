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

// Homepage Route
Route::get('/', [HomeController::class, 'index'])->name('home');


// Create employee info
Route::get('/add-employee', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/add-basic-profile', [EmployeeController::class, 'store'])->name('basic_profile.store');


// Edit employee info
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}/edit/update-details', [EmployeeController::class, 'update'])->name('employee.update');


// Delete employee
Route::delete('/employees/{id}', [EmployeeController::class, 'delete'])->name('employees.delete');


// Employee Overview Route -- {id} should be added later at development stage of this page
Route::get('/employee-overview/{id}', [EmployeeController::class, 'show'])->name('employee_overview.show');

