<?php

use App\controllers\UserController;
use App\routes\Route;

Route::get('/user/create', [UserController::class, 'create']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);



// Route::post('/user/store', 'UserController@store');
