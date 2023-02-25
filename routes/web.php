<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PageController;
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



Auth::routes(['register' => false]);

Route::middleware('auth')->controller(PageController::class)->group(function () {
    Route::get('/', 'home');

    Route::resource('employees', EmployeeController::class);
    Route::get('/employees/datatables/ssd', [EmployeeController::class, 'ssd'])->name('getDatatable');
});
