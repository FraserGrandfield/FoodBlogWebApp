<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;

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


Route::get('/', function () {return redirect()->route('posts.index');})->name('home');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/create', [PostController::class, 'create'])->middleware('verify_not_admin')->middleware('auth')->name('posts.create');

Route::post('posts', [PostController::class, 'store'])->middleware('verify_not_admin')->middleware('auth')->name('posts.store');

Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::post('posts/{id}', [PostController::class, 'update'])->middleware('verify_not_admin')->middleware('verify_profile_posts')->name('posts.update');

Route::delete('posts/{id}', [PostController::class, 'destroy'])->middleware('verify_profile_posts')->name('posts.destroy');

Route::get('posts/{id}/edit', [PostController::class, 'edit'])->middleware('verify_not_admin')->middleware('verify_profile_posts')->name('posts.edit');

Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->middleware('verify_not_admin')->middleware('verify_profile')->name('profile.edit');

Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

Route::post('profile/{id}', [ProfileController::class, 'update'])->middleware('verify_not_admin')->middleware('verify_profile')->name('profile.update');

Route::get('comments/{id}', [CommentController::class, 'edit'])->middleware('verify_not_admin')->middleware('verify_profile_comments')->name('comments.edit');

Route::post('comments/{id}', [CommentController::class, 'update'])->middleware('verify_not_admin')->middleware('verify_profile_comments')->name('comments.update');

Route::delete('comments/{id}', [CommentController::class, 'destroy'])->middleware('verify_not_admin')->middleware('verify_profile_comments')->name('comments.destroy');

Route::get('recipies', [RecipeController::class, 'show'])->name('recipies.show');

Route::post('recipies', [RecipeController::class, 'search'])->name('recipies.search');

Route::post('notification/get', [NotificationController::class, 'get']);

Route::post('notification/read', [NotificationController::class, 'read']);

require __DIR__.'/auth.php';
