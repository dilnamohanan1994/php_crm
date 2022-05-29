<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/companies', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('company.list');
    Route::get('/admin/companies/create', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('company.create');
    Route::post('/admin/companies/store', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('company.store');
    Route::get('/admin/companies/edit/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/admin/companies/update/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'update'])->name('company.update');
    Route::post('/admin/companies/destroy/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'destroy'])->name('company.destroy');

    Route::get('/admin/employees', [App\Http\Controllers\Admin\EmployeesController::class, 'index'])->name('employees.list');
    Route::get('/admin/employees/create', [App\Http\Controllers\Admin\EmployeesController::class, 'create'])->name('employees.create');
    Route::post('/admin/employees/store', [App\Http\Controllers\Admin\EmployeesController::class, 'store'])->name('employees.store');
    Route::get('/admin/employees/edit/{id}', [App\Http\Controllers\Admin\EmployeesController::class, 'edit'])->name('employees.edit');
    Route::post('/admin/employees/update/{id}', [App\Http\Controllers\Admin\EmployeesController::class, 'update'])->name('employees.update');
    Route::post('/admin/employees/destroy/{id}', [App\Http\Controllers\Admin\EmployeesController::class, 'destroy'])->name('employees.destroy');
});
Route::get('/logout', [App\Http\Controllers\SessionController::class, 'destroy'])->name('logout');
