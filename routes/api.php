<?php

use App\Http\Controllers\Auth\CadastroUsuarioController;
use App\Http\Controllers\Auth\LoginUsuarioController;
use App\Http\Requests\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/registrar', CadastroUsuarioController::class);
    Route::get('/login', LoginUsuarioController::class);

    Route::middleware(['auth:sanctum'])->group(function () {

        // VERIFICAR EMAIL
        Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
            $request->fulfill();
            return response()->json(['message' => 'Email verified successfully.']);
        }); // ->middleware('verified')

    });
});
