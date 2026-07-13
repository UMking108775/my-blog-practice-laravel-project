<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;



Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.signup');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/', function () {
    return view('public.home');
})->name('home');

// / category routes
Route::get('/category', [categoryController::class, 'index'])->name('category.index')->middleware('auth');
Route::delete('/category/{category}', [categoryController::class, 'destroy'])->name('category.destroy')->middleware('auth');

Route::get('/category/create', function () {
    return view('admin.category.create');
})->name('category.create')->middleware('auth');

Route::post('/category/create', [categoryController::class, 'createCategory']);

Route::get('/category/edit/{category}', [categoryController::class, 'edit'])->name('category.edit')->middleware('auth');

Route::patch('/category/edit/{category}', [categoryController::class, 'update'])->name('category.update')->middleware('auth');

// // post routes
Route::get('/post', [postController::class, 'index'])->name('post.index')->middleware('auth');
Route::delete('/post/{post}', [postController::class, 'destroy'])->name('post.destroy')->middleware('auth');

Route::get('/post/create', [postController::class, 'create'])->name('post.create')->middleware('auth');

Route::post('/post/create', [postController::class, 'createPost'])->name('post.createPost')->middleware('auth');

Route::get('/post/edit/{post}', [postController::class, 'edit'])->name('post.edit')->middleware('auth');

Route::patch('/post/edit/{post}', [\App\Http\Controllers\postController::class, 'update'])->name('post.update')->middleware('auth');

Route::get('/settings', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings')->middleware('auth');

Route::put('/settings', [\App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update')->middleware('auth');


