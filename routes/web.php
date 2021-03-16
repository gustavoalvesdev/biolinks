<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;

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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/admin')->group(function() {

    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'loginAction']);

    Route::get('/register', [AdminController::class, 'register']);
    Route::post('/register', [AdminController::class, 'registerAction']);

    Route::get('/logout', [AdminController::class, 'logout']);

    Route::get('/', [AdminController::class, 'index']);

    Route::get('/{slug}/links', [AdminController::class, 'pageLinks']);
    Route::get('/{slug}/design', [AdminController::class, 'pageDesign']);
    Route::get('/{slug}/stats', [AdminController::class, 'pageStats']);

    Route::get('/linkorder/{linkId}/{pos}', [AdminController::class, 'linkOrderUpdate']);

    Route::get('/{slug}/newlink', [AdminController::class, 'newLink']);
});

Route::get('/{slug}', [PageController::class, 'index']);
