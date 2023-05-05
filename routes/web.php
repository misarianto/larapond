<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\StorePostController;
use App\Http\Controllers\DeleteTemporaryImageController;
use App\Http\Controllers\UploadTemporaryImageController;

Route::get('/', WelcomeController::class);
Route::post('/upload', UploadTemporaryImageController::class);
Route::delete('/delete', DeleteTemporaryImageController::class);
Route::post('/', StorePostController::class);
