<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\backend\EpisodeController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\auth\LoginController;
use App\Http\Controllers\backend\InstructorController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\frontend\Auth\UserLoginController;
use App\Http\Controllers\backend\auth\ResetPasswordController;
use App\Http\Controllers\backend\auth\ForgotPasswordController;
use App\Http\Controllers\frontend\Auth\EmailVerificationController;
use App\Http\Controllers\frontend\Auth\UserResetPasswordController;
use App\Http\Controllers\frontend\Auth\UserForgotPasswordController;




Route::get('/', function () {return view('frontend/home');})->name('home');
Route::get('/courses', function () {return view('frontend/courses');})->name('courses');
Route::get('/about', function () {return view('frontend/about');})->name('about');
Route::get('/contact', function () {return view('frontend/contact');})->name('contact');

Route::get('register', [RegisterController::class, 'index'])->name('get.register');
Route::post('register', [RegisterController::class, 'postRegister'])->name('post.register');

Route::get('login', [UserLoginController::class, 'Login'])->name('get.login');
Route::post('login', [UserLoginController::class, 'postLogin'])->name('post.login');
Route::get('logout', [UserLoginController::class, 'Logout'])->name('logout');



Route::prefix('email/verify')->group(function(){
    Route::get('/', [EmailVerificationController::class, 'verify'])->name('verification.verify');
    Route::get('notice', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');
    Route::get('sent', [EmailVerificationController::class, 'sent'])->name('verification.sent');
    Route::get('success', [EmailVerificationController::class, 'success'])->name('verification.success');
});

Route::get('forgot-password' ,[UserForgotPasswordController::class, 'index'])->name('forgotPassword.index');
Route::post('forgot-password' ,[UserForgotPasswordController::class, 'sendEmail'])->name('forgotPassword.send-email');

Route::get('reset-password', [UserResetPasswordController::class, 'index'])->name('resetPassword.index'); 
Route::post('reset-password', [UserResetPasswordController::class, 'reset'])->name('resetPassword.reset');





Route::group([
    
     'middleware'=>'guest',
   
],function(){

Route::get('admin/', function(){return view('backend/index');})->name('admin');

Route::get('admin/login', [LoginController::class, 'Login'])->name('admin_get.login');
Route::post('admin/login', [LoginController::class, 'postLogin'])->name('admin_post.login');
Route::get('admin/logout', [LoginController::class, 'Logout'])->name('admin.logout');

Route::get('admin/forgot-password' ,[ForgotPasswordController::class, 'index'])->name('forgot-password.index');
Route::post('admin/forgot-password' ,[ForgotPasswordController::class, 'sendEmail'])->name('forgot-password.send-email');

Route::get('admin/reset-password', [ResetPasswordController::class, 'index'])->name('reset-password.index'); 
Route::post('admin/reset-password', [ResetPasswordController::class, 'reset'])->name('reset-password.reset');

});


Route::group([
    'prefix'=>'admin/',
     'middleware'=>'auth:admin',
    //  'namespace'=>'App\Http\Controllers\backend'
],function(){

   
//admin
Route::get('admin-account', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin-account/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin-account', [AdminController::class, 'store'])->name('admin.store');
Route::get('admin-account/{admin:id}', [AdminController::class,'show'])->name('admin.show');
Route::delete('admin-account/{admin:id}', [AdminController::class,'destroy'])->name('admin.destroy');
Route::get('admin-account/{admin:id}/edit', [AdminController::class,'edit'])->name('admin.edit');
Route::patch('admin-account/{admin:id}', [AdminController::class,'update'])->name('admin.update');

//user

Route::get('user-account', [UserController::class, 'index'])->name('user.index');
Route::get('user-account/create', [UserController::class, 'create'])->name('user.create');
Route::post('user-account', [UserController::class, 'store'])->name('user.store');
Route::get('user-account/{user:id}', [UserController::class,'show'])->name('user.show');
Route::delete('user-account/{user:id}', [UserController::class,'destroy'])->name('user.destroy');
Route::get('user-account/{user:id}/edit', [UserController::class,'edit'])->name('user.edit');
Route::patch('user-account/{user:id}', [UserController::class,'update'])->name('user.update');

//instructor

Route::get('instructor-account', [InstructorController::class, 'index'])->name('instructor.index');
Route::get('instructor-account/create', [InstructorController::class, 'create'])->name('instructor.create');
Route::post('instructor-account', [InstructorController::class, 'store'])->name('instructor.store');
Route::get('instructor-account/{instructor:id}', [InstructorController::class,'show'])->name('instructor.show');
Route::delete('instructor-account/{instructor:id}', [InstructorController::class,'destroy'])->name('instructor.destroy');
Route::get('instructor-account/{instructor:id}/edit', [InstructorController::class,'edit'])->name('instructor.edit');
Route::patch('instructor-account/{instructor:id}', [InstructorController::class,'update'])->name('instructor.update');


//category

Route::get('category-account', [CategoryController::class, 'index'])->name('category.index');
Route::get('category-account/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category-account', [CategoryController::class, 'store'])->name('category.store');
Route::get('category-account/{category:id}', [CategoryController::class,'show'])->name('category.show');
Route::delete('category-account/{category:id}', [CategoryController::class,'destroy'])->name('category.destroy');
Route::get('category-account/{category:id}/edit', [CategoryController::class,'edit'])->name('category.edit');
Route::patch('category-account/{category:id}', [CategoryController::class,'update'])->name('category.update');

//course
Route::get('course-account', [CourseController::class, 'index'])->name('course.index');
Route::get('course-account/create', [CourseController::class, 'create'])->name('course.create');
Route::post('course-account', [CourseController::class, 'store'])->name('course.store');
Route::get('course-account/{course:id}', [CourseController::class,'show'])->name('course.show');
Route::delete('course-account/{course:id}', [CourseController::class,'destroy'])->name('course.destroy');
Route::get('course-account/{course:id}/edit', [CourseController::class,'edit'])->name('course.edit');
Route::patch('course-account/{course:id}', [CourseController::class,'update'])->name('course.update');

//
Route::get('role-account', [RoleController::class, 'index'])->name('role.index');
Route::get('role-account/create', [RoleController::class, 'create'])->name('role.create');
Route::post('role-account', [RoleController::class, 'store'])->name('role.store');
Route::get('role-account/{role:id}', [RoleController::class,'show'])->name('role.show');
Route::delete('role-account/{role:id}', [RoleController::class,'destroy'])->name('role.destroy');
Route::get('role-account/{role:id}/edit', [RoleController::class,'edit'])->name('role.edit');
Route::patch('role-account/{role:id}', [RoleController::class,'update'])->name('role.update');

//episode
Route::get('episode-account', [EpisodeController::class, 'index'])->name('episode.index');
Route::get('episode-account/create', [EpisodeController::class, 'create'])->name('episode.create');
Route::post('episode-account', [EpisodeController::class, 'store'])->name('episode.store');
Route::get('episode-account/{episode:id}', [EpisodeController::class,'show'])->name('episode.show');
Route::delete('episode-account/{episode:id}', [EpisodeController::class,'destroy'])->name('episode.destroy');
Route::get('episode-account/{episode:id}/edit', [EpisodeController::class,'edit'])->name('episode.edit');
Route::patch('episode-account/{episode:id}', [EpisodeController::class,'update'])->name('episode.update');

});




 

