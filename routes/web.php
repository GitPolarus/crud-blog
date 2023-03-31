<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AllpostsController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [HomeController::class, 'index'])->name("view.home");
Route::get('/login', [AuthController::class, 'loginview'])->name("view.login");
Route::get('/register', [AuthController::class, 'registerview'])->name("view.register");
Route::post('/register', [AuthController::class, 'register'])->name("register");
Route::post('/login', [AuthController::class, 'login'])->name("login");
Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
Route::get('/admin', [AdminController::class, 'index'])->name("view.admin.home");
Route::resource("posts", PostController::class);
Route::resource("users", UserController::class);
Route::resource("postslist", AllpostsController::class);
Route::resource("comments", CommentController::class);
// Route::get("/postslist", [PostsListController::class, 'index'])->name("postslist");
