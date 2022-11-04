<?php

use App\controllers\UserController;
use App\routes\Route;

Route::get('/create', [UserController::class, 'create']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::get('/user/show/{id}', [UserController::class, 'show']);


Route::post('/user/store', [UserController::class, 'index']);
