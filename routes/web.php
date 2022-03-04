<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TrendController;
use App\Models\Bookmark;
use App\Models\Follow;
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

//auth route
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);

Route::get('/write', [BlogController::class, 'create']);
Route::post('/write', [BlogController::class, 'store']);

Route::get('/singlePost/{blog}', [BlogController::class, 'show'])->name('singlePost');
Route::get('/singlePost/edit/{blog}', [BlogController::class, 'edit']);
Route::put('/singlePost/update/{blog}', [BlogController::class, 'update']);
Route::get('/singlePost/delete/{blog}', [BlogController::class, 'delete']);

Route::post('/comment/{blog}', [CommentController::class, 'comment']);
Route::get('/comment/delete/{comment}', [CommentController::class, 'delete']);

Route::post('/comment/like/{comment}', [CommentController::class, 'like']);
Route::delete('/comment/unlike/{comment}', [CommentController::class, 'destroyLike']);

Route::post('singlePost/like/{blog}', [LikeController::class, 'store']);
Route::delete('/singlePost/unlike/{blog}', [LikeController::class, 'destroy']);

Route::post('/singlePost/bookmark/{blog}', [BookmarkController::class, 'store']);
Route::delete('/singlePost/bookmark/{blog}', [BookmarkController::class, 'destroy']);

Route::post('/follow/{user}', [FollowController::class, 'store']);
Route::delete('/follow/{user}', [FollowController::class, 'destroy']);

Route::get('/setting/{user}', [SettingController::class, 'edit']);
Route::put('/setting/{user}', [SettingController::class, 'update']);
Route::delete('/setting/{user}', [SettingController::class, 'destroy']);

Route::get('/profile/{user}', [SettingController::class, 'show']);

Route::get('/trend', [TrendController::class, 'index']);

Route::get('/listFollower/{user}', [FollowController::class, 'show']);

Route::get('/bookmark/{user}', [BookmarkController::class, 'show']);

Route::get('/trend', function(){
    return view('page.trend');
});





