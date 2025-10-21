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

//students create roote 

//
Route::get('/students/data', [StudentController::class, 'getData'])->name('students.data');
Route::resource('students', StudentController::class);

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


// Products resource routes
Route::resource('products', ProductController::class);



// Optional dashboard after login
Route::get('/dashboard', function () {return view('dashboard'); })->middleware('auth');
   