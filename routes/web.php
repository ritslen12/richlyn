<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('employee', [\App\Http\Controllers\employeeController::class, 'index'])->name('employee.index');
    Route::post('employee', [\App\Http\Controllers\employeeController::class, 'store'])->name('employee.store');
    Route::get('employers', [\App\Http\Controllers\employeeController::class, 'show'])->name('employee.show');
    Route::get('/employees/{id}/edit', [\App\Http\Controllers\employeeController::class, 'edit'])->name('employees.edit');
    Route::patch('employee/{id}', [\App\Http\Controllers\employeeController::class, 'update'])->name('employee.update');
    Route::get('/employees/{id}/delete', [\App\Http\Controllers\employeeController::class, 'destroy'])->name('employees.destroy');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
