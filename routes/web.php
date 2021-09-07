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

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('index');
    Route::resources([
        'companies' => \App\Http\Controllers\Dashboard\CompaniesController::class,
        'employees' => \App\Http\Controllers\Dashboard\EmployeesController::class,
    ]);
});

require __DIR__.'/auth.php';
