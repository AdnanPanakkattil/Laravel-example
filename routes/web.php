<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('layout'); // Make sure this view exists: resources/views/layout.blade.php
});

// Students resource routes
Route::resource('students', StudentController::class);
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::delete('/students/{id}/delete', [StudentController::class, 'destroy'])->name('students.destroy');

// Table view route
Route::get('table', [Controller::class, 'Table']);

// User Registration Routes
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');

// User Login Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('users.login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');

// User Logout Route
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Products resource routes
Route::resource('products', ProductController::class);

// Manual user creation (optional)
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Optional dashboard after login
Route::get('/dashboard', function () {
    return view('dashboard'); // Create resources/views/dashboard.blade.php if needed
})->middleware('auth');
