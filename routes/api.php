<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TesteController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegarClienteTestesController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('loginWithToken', [AuthenticatedSessionController::class, 'requestToken']);
Route::post('login',[AuthenticatedSessionController::class,"store"]);

Route::post("getperguntas",[TesteController::class,"getPerguntas"]);
Route::post("cadastrarCliente",[ClienteController::class,"Cadastrar"]);
Route::get('pegarCliteTeste',[TesteController::class, "pegarClienteTeste"]);
Route::post("enviarRespostas",[TesteController::class,"enviarRespostas"]);
Route::post("chartCliente",[ChartController::class,"grafico"]);
