<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home route

Route::get('/', function () {
    return view('layout'); 
});





//students roote 

Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('students/{id}/show', [StudentController::class, 'show'])->name('students.show');
Route::post('students', [studentController::class, 'store'])->name('students.store');
Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('students/update/{studentId}', [StudentController::class, 'update'])->name('students.update');
Route::delete('students/{students}', [studentController::class, 'destroy'])->name('student.destroy');





// Table view route

Route::get('table', [Controller::class, 'Table']);





// Show registration form

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');





// User Login Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('users.login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');





// User Logout Route
Route::post('/logout', [UserController::class, 'logout'])->name('logout');





//products root




Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');





// Optional dashboard after login
Route::get('/dashboard', function () {return view('dashboard'); })->middleware('auth');
   