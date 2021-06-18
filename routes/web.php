<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;

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

Route::get('/', function () { return view('login'); });

Route::get('/dashboard', function () { return view('dashboard'); })->name('index');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoriesController::class, 'editPage'])->name('categories.editPage');
Route::post('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::delete('/categories/{id}/delete', [CategoriesController::class, 'delete'])->name('categories.delete');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}/edit', [PostController::class, 'editPage'])->name('posts.editPage');
Route::put('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{id}/delete', [PostController::class, 'delete'])->name('posts.delete');


Route::get('/auth/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
Route::get('/auth/register', [AuthController::class, 'registerForm'])->name('auth.registerForm');

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');

