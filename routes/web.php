<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\auth\LoginController;
use App\Http\Controllers\backend\InstructorController;
use App\Http\Controllers\backend\auth\RegisterController;
use App\Http\Controllers\backend\auth\ResetPasswordController;
use App\Http\Controllers\backend\auth\ForgotPasswordController;

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

Route::get('/admin', function(){
    return view('backend/index');
})->name('admin');
//admin
Route::get('admin/admin_account', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin/admin_account/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin/admin_account', [AdminController::class, 'store'])->name('admin.store');
Route::delete('admin/admin_account/{admin:id}', [AdminController::class,'destroy'])->name('admin.destroy');
Route::get('admin/admin_account/{admin:id}/edit', [AdminController::class,'edit'])->name('admin.edit');
Route::patch('admin/admin_account/{admin:id}', [AdminController::class,'update'])->name('admin.update');

//user

Route::get('admin/user_account', [UserController::class, 'index'])->name('user.index');
Route::get('admin/user_account/create', [UserController::class, 'create'])->name('user.create');
Route::post('admin/user_account', [UserController::class, 'store'])->name('user.store');
Route::delete('admin/user_account/{user:id}', [UserController::class,'destroy'])->name('user.destroy');
Route::get('admin/user_account/{user:id}/edit', [UserController::class,'edit'])->name('user.edit');
Route::patch('admin/user_account/{user:id}', [UserController::class,'update'])->name('user.update');

//instructor

Route::get('admin/instructor_account', [InstructorController::class, 'index'])->name('instructor.index');
Route::get('admin/instructor_account/create', [InstructorController::class, 'create'])->name('instructor.create');
Route::post('admin/instructor_account', [InstructorController::class, 'store'])->name('instructor.store');
Route::delete('admin/instructor_account/{instructor:id}', [InstructorController::class,'destroy'])->name('instructor.destroy');
Route::get('admin/instructor_account/{instructor:id}/edit', [InstructorController::class,'edit'])->name('instructor.edit');
Route::patch('admin/instructor_account/{instructor:id}', [InstructorController::class,'update'])->name('instructor.update');


//category

Route::get('admin/category_account', [CategoryController::class, 'index'])->name('category.index');
Route::get('admin/category_account/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('admin/category_account', [CategoryController::class, 'store'])->name('category.store');
Route::delete('admin/category_account/{category:id}', [CategoryController::class,'destroy'])->name('category.destroy');
Route::get('admin/category_account/{category:id}/edit', [CategoryController::class,'edit'])->name('category.edit');
Route::patch('admin/category_account/{category:id}', [CategoryController::class,'update'])->name('category.update');



Route::get('admin/login', [LoginController::class, 'Login'])->name('admin_get.login');
Route::post('admin/login', [LoginController::class, 'postLogin'])->name('admin_post.login');
Route::get('admin/logout', [LoginController::class, 'Logout'])->name('admin.logout');

Route::get('admin/forgot-password' ,[ForgotPasswordController::class, 'index'])->name('forgot-password.index');
Route::post('admin/forgot-password' ,[ForgotPasswordController::class, 'sendEmail'])->name('forgot-password.send-email');

Route::get('admin/reset-password', [ResetPasswordController::class, 'index'])->name('reset-password.index'); 
Route::post('admin/reset-password', [ResetPasswordController::class, 'reset'])->name('reset-password.reset'); 

