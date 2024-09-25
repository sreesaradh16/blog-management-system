<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware(['auth:api', 'log.api'])->group(function () {
    Route::get('tag/list', [TagController::class, 'index']);
    Route::get('category/list', [CategoryController::class, 'index']);
    Route::post('post/store', [PostController::class, 'store']);
    Route::get('post/list', [PostController::class, 'index']);
    Route::get('post/{post}/view', [PostController::class, 'show']);
    Route::post('post/{post}/update', [PostController::class, 'update']);
    Route::delete('post/{post}/delete', [PostController::class, 'destroy']);
});
