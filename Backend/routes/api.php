<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users',[UserController::class, 'index']);
Route::post('/users',[UserController::class, 'store']);
Route::get('/users/{id}',[UserController::class, 'show']);
Route::get('/users/delete/{id}',[UserController::class, 'destroy']);

//Manejo de Estados
Route::post('/state',[StateController::class, 'actualizar']);

