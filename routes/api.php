<?php

use App\Http\Controllers\Auth\CadastroUsuarioController;
use App\Http\Controllers\Auth\LoginUsuarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/registrar', CadastroUsuarioController::class);
    Route::get('/login', LoginUsuarioController::class);

    Route::middleware(['auth:sanctum'])->group(function () {
        //
    });
});
