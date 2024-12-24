<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [PostController::class, 'index']);
Route::get('/p/create', [PostController::class, 'create']);
Route::get('/p/{post}', [PostController::class, 'show']);


Route::post('/follow/{user}', [PostController::class, 'follow'])->name('follow');
Route::delete('/unfollow/{user}', [PostController::class, 'unfollow'])->name('unfollow');

Route::post('/p', [PostController::class, 'store']);


Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}/edit', [ProfilesController::class, 'update'])->name('profile.update');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
