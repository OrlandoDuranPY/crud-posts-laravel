<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Models\Category;
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


/* ========================================
Categories api routes
========================================= */
Route::get('category/all', [CategoryController::class, 'all']); // get all categories
Route::resource('category', CategoryController::class)->except('create', 'edit');
Route::get('category/{category}/posts', [CategoryController::class, 'posts']);
Route::get('category/slug/{slug}', [CategoryController::class, 'slug']);

/* ========================================
Posts api routes
========================================= */
Route::get('post/all', [PostController::class, 'all']); // get all posts
Route::resource('post', PostController::class)->except('create', 'edit');
Route::get('post/slug/{slug}', [PostController::class, 'slug']);
