<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::admineticAuth();

// Route::view('/', 'welcome');
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/article/{id}', [HomeController::class, 'article'])->name('article');

Route::get('/blog/{id}', [HomeController::class, 'blog'])->name('blog');

//Resourceful Routes

Route::group(['prefix' => config('adminetic.prefix', 'admin'), 'middleware' => config('adminetic.middleware')], function () {
    Route::resource('comment', CommentController::class);
});
