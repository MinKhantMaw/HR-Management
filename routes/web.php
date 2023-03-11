<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes(['register' => false]);

Route::middleware('auth')->controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');

    Route::resource('employees', EmployeeController::class);
    Route::get('/employees/datatables/ssd', [EmployeeController::class, 'ssd'])->name('getDatatable');

    // profile

    Route::prefix('profile')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'profile')->name('profile');
    });
});
