<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [JobController::class, 'index'])->name('jobs.index');
Route::get('jobs/{job}/show', [JobController::class, 'show'])->name('jobs.show');

Route::get('jobs/listing', [JobController::class, 'listing'])->name('jobs.listing')->middleware('auth');

Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create')->middleware('auth');
Route::post('jobs/create', [JobController::class, 'store'])->name('jobs.store')->middleware('auth');
Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware('auth');
Route::put('jobs/{job}/update', [JobController::class, 'update'])->name('jobs.update')->middleware('auth');
Route::get('jobs/{job}/delete', [JobController::class, 'delete'])->name('jobs.destroy')->middleware('auth');

// user routes
Route::get('/user/register', [UserController::class, 'register'])->name('user.register')->middleware('guest');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store')->middleware('guest');

Route::get('/user/login', [UserController::class, 'create'])->name('user.create')->middleware('guest');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login')->middleware('guest');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth');

