<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUsuarioRequest;
use App\Repositories\Interfaces\IUserInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LoginUsuarioController extends Controller
{
    public function __invoke(
        IUserInterface $userRepository,
        LoginUsuarioRequest $loginUserData
    ) {
        try {

            $user = $userRepository->getUsuarioPeloEmail($loginUserData['email']);

            if (! $user || ! Hash::check($loginUserData['password'], $user->password)) {
                return response()->json([
                    'message' => 'Invalid Credentials',
                ], Response::HTTP_UNAUTHORIZED);
            }

            $tokenName = Str::slug($user->name, '-').'_api-token';

            $user->tokens()->where('id', $tokenName)->delete();
            $token = $user->createToken($tokenName)->plainTextToken;

            return response()->json(['access_token' => $token], Response::HTTP_OK);

        } catch (\Throwable $e) {
            Log::error(__CLASS__.', linha: '.$e->getLine(), [
                'loginUserData' => $loginUserData,
                'erro' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Erro ao realizar login'], Response::HTTP_BAD_REQUEST);
        }
    }
}
