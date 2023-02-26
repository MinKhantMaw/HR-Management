<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes(['register' => false]);

Route::middleware('auth')->controller(PageController::class)->group(function () {
    Route::get('/', 'home');

    Route::resource('employees', EmployeeController::class);
    Route::get('/employees/datatables/ssd', [EmployeeController::class, 'ssd'])->name('getDatatable');
});
