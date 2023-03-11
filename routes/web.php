<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get("/accueil", [HomeController::class, "displayHome"]);
Route::get("/addPost", [PostController::class, 'create']);
Route::post("/savePost", [PostController::class, 'store']);
Route::put("/updatePost/{id}", [PostController::class, 'update']);
Route::get("/listPost", [PostController::class, 'index']);
Route::get("/editPost/{id}", [PostController::class, 'edit']);
Route::delete("/deletePost/{id}", [PostController::class, 'destroy']);