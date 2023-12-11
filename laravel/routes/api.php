<?php

use App\Http\Controllers\StudentCOntroller;
use App\Http\Controllers\UserController;
use App\Models\User;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();

// });


// Public api

Route::get('/students', [StudentCOntroller::class,'index']);
Route::get('/students/{id}', [StudentCOntroller::class,'show']);
Route::post('/students', [StudentCOntroller::class,'store']);
Route::put('/students/{id}', [StudentCOntroller::class,'update']);
Route::delete('/students/{id}', [StudentCOntroller::class,'destroy']);
Route::get('/students/search/{city}', [StudentCOntroller::class,'search']);

// Public api using single resource route
// Route::resource('students', StudentCOntroller::class);


// Authentications for register and login
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);


// athenticated api

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/students', [StudentCOntroller::class, 'index']);
//     Route::get('/students/{id}', [StudentCOntroller::class, 'show']);
//     Route::post('/students', [StudentCOntroller::class, 'store']);
//     Route::put('/students/{id}', [StudentCOntroller::class, 'update']);
//     Route::delete('/students/{id}', [StudentCOntroller::class, 'destroy']);
//     Route::get('/students/search/{city}', [StudentCOntroller::class, 'search']);
//     Route::post('/logout', [UserController::class, 'logout']);
// });


// Partially Protected

// Route::get('/students', [StudentCOntroller::class, 'index']);
// Route::get('/students/{id}', [StudentCOntroller::class, 'show']);
// Route::get('/students/search/{city}', [StudentCOntroller::class, 'search']);
// Route::middleware('auth:sanctum')->group(function(){
//     Route::post('/students', [StudentCOntroller::class, 'store']);
//     Route::put('/students/{id}', [StudentCOntroller::class, 'update']);
//     Route::delete('/students/{id}', [StudentCOntroller::class, 'destroy']);
//     Route::post('/logout', [UserController::class, 'logout']);
// });
