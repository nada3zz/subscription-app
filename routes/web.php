<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\User\UserAuthController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Auth\Admin\AdminAuthController;

//use App\Http\Controllers\Admin\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteManageUsersControllerProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth Routes
Route::middleware('guest')->controller(UserAuthController::class)->group(function () {
    Route::get('/register', 'show_register_step_one')->name('register.step-one');
    Route::post('/register/step-one', 'process_register_step_one')->name('register.post-step-one');
    Route::get('/register/step-two', 'show_register_step_two')->name('register.step-two');
    Route::post('/register/step-two', 'process_register_step_two')->name('register.post-step-two');
    Route::get('/login', 'show_login')->name('show.login');
    Route::post('/login', 'login')->name('login');
});


//User Routes
Route::middleware('auth')->get('/', [UserHomeController::class, 'index'])->name('user.home'); 
Route::middleware('auth')->post('/logout', [UserAuthController::class, 'logout'])->name('logout');


//Admin Routes
Route::get('admin/login', [AdminAuthController::class, 'show_login'])->name('show.admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');    
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::middleware('admin.auth')->get('admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
Route::middleware(['admin.auth'])->get('admin/home/users/edit', [ManageUsersController::class, 'edit'])->name('user.edit');
Route::middleware(['admin.auth'])->patch('admin/home/users/edit', [ManageUsersController::class, 'update'])->name('user.update');
Route::middleware(['admin.auth'])->delete('admin/home/users', [ManageUsersController::class, 'destroy'])->name('user.destroy');
Route::middleware(['admin.auth'])->get('admin/home/users', [ManageUsersController::class, 'index'])->name('user.index');




