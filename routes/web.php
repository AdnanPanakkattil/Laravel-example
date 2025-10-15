<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/',  function () {
    return view( 'layout'); 
});

Route::resource('/students', StudentController::class);

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::delete('/students/{id}/delete', [StudentController::class, 'delete'])->name('students'); 

Route::get ('Table', [Controller::class, 'Table']);

//register and loging uders

Route :: post ('/register', [ UserController :: class, 'store'])->name('users.store');
Route :: get  ('/register', [ UserController :: class, 'create'])->name('users.create');  
Route :: get  ('/login',    [ UserController :: class, 'showLoginForm'])->name('users.login');
Route :: post ('/login',    [ UserController :: class, 'login'])->name('login.submit');
Route :: post ('/logout',   [ UserController :: class, 'logout'])->name('logout');
Route :: get  ('/register', [ UserController :: class, 'create'])->name('users.create');


//products root 

Route::resource('products', ProductController::class);
