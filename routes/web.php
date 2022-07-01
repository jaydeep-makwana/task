<?php

use App\Http\Controllers\operationController;
use App\Http\Controllers\PostController;
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

Route::get('/', [operationController::class,'index'])->middleware('login');

Route::post('register',[operationController::class,'store']);

Route::view('admin_login','admin_login')->middleware('login');
Route::post('admin_login',[operationController::class,'admin_login']);

Route::view('login','login')->middleware('login');
Route::post('login',[operationController::class,'login']);

Route::view('user_dashboard','user_dashboard')->middleware('logout');
Route::view('admin_dashboard','admin_dashboard')->middleware('admin_logout');

Route::view('create_post','create_post')->middleware('logout');
Route::post('create_post',[PostController::class,'createPost']);

Route::post('search_data',[operationController::class,'search_data']);

Route::get('admin_dashboard',[operationController::class,'admin_panel'])->middleware('admin_logout');

Route::get('logout',[operationController::class,'logout']);



