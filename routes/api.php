<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TesteController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('loginWithToken', [AuthenticatedSessionController::class, 'requestToken']);
Route::post('login',[AuthenticatedSessionController::class,"store"]);

Route::post("getperguntas",[TesteController::class,"getPerguntas"]);