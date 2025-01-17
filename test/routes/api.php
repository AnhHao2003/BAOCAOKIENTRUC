<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\PostController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts',PostController::class );
Route::get('posts/{id}', [PostController::class, 'show']);

// Route::post('posts', 'PostController@store');
Route::post('/posts', [PostController::class, 'store']);

Route::patch('/posts/{id}', [PostController::class, 'update']);

// Route for deleting a post
Route::delete('/posts/{id}', [PostController::class, 'destroy']);