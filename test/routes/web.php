<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\UserController;

/*
|---------------------------------------------------------------------- 
| Web Routes 
|---------------------------------------------------------------------- 
|
| Here is where you can register web routes for your application. 
| These routes are loaded by the RouteServiceProvider and all of them 
| will be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Post Management Routes - Dành riêng cho PostController
Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); // Hiển thị danh sách bài đăng
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // Form Thêm bài đăng
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Lưu bài đăng
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); 
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
// Xóa bài đăng
});

// Profile Routes - Dành riêng cho ProfileController
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
