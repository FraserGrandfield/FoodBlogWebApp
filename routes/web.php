<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;


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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('posts');
});

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');

Route::post('posts', [PostController::class, 'store'])->middleware('auth')->name('posts.store');

Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::post('posts/{id}', [PostController::class, 'update'])->middleware('verify_profile_posts')->name('posts.update');

Route::get('posts/{id}/edit', [PostController::class, 'edit'])->middleware('verify_profile_posts')->name('posts.edit');

Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->middleware('verify_profile')->name('profile.edit');

Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

Route::post('profile/{id]', [ProfileController::class, 'update'])->middleware('verify_profile')->name('profile.update');

require __DIR__.'/auth.php';
