<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\BlogController;
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



Route::get('/', function () {
    return view('welcome');
});

/* ========================================
Rutas para el manejo de las categorias
y posts
========================================= */
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class
    ]);
});


/* ========================================
Rutas para el blog
========================================= */
Route::group(['prefix' => 'blog'], function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/', 'index')->name('web.blog.index');
        Route::get('/{post}', 'show')->name('web.blog.show');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/* ========================================
Rutas de Vue
========================================= */
Route::get('/vue', function(){
    return view('vue');
});

require __DIR__ . '/auth.php';
