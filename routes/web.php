<?php

use App\Http\Controllers\PostValidationController;
use App\Http\Controllers\CategoryUserController;
use App\Http\Controllers\PostUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'home'])->name('home.home');
Route::get('/request-posts', [PostValidationController::class, 'requestPostValidation'])->name('postsValidation.requestPostValidation');
Route::get('/blog', [PostValidationController::class, 'index'])->name('postsValidation.index');
Route::put('/request-posts/approved/{post}', [PostValidationController::class, 'updateApprovedState'])->name('postsValidation.updateApprovedState');
Route::put('/request-posts/rejected/{post}', [PostValidationController::class, 'updateRejectedState'])->name('postsValidation.updateRejectedState');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post:slug}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/{user:slug}/post', [PostUserController::class, 'index'])->name('postsUsers.index');
Route::get('/{user:slug}/post/create', [PostUserController::class, 'create'])->name('postsUsers.create');
Route::post('/{user}/post/create', [PostUserController::class, 'store'])->name('postsUsers.store');

Route::get('/blog/{categoryTitle:slug}', [CategoryUserController::class, 'index'])->name('categoryUser.index');
Route::post('/{user}/select-category', [CategoryUserController::class, 'store'])->name('categoriesUsers.store');
