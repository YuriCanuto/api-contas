<?php

namespace App\Http\Controllers\Auth;

use App\DTO\Usuario\CadastroUsuarioDTO;
use App\Events\UsuarioRegistradoEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CadastroUsuarioRequest;
use App\Repositories\Interfaces\IUserInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CadastroUsuarioController extends Controller
{
    public function __invoke(
        IUserInterface $userRepository,
        CadastroUsuarioRequest $request,
        CadastroUsuarioDTO $cadastroUsuarioDTO,
    ) {
        try {

            $cadastroUsuarioDTO->from($request)->all();

            $user = $userRepository->create($cadastroUsuarioDTO);

            UsuarioRegistradoEvent::dispatch($user);

            return response()->json(['message' => 'Usuário registrado com sucesso!', 'usuario' => $user], Response::HTTP_OK);

        } catch (\Throwable $e) {
            Log::error(__CLASS__.', linha: '.$e->getLine(), [
                'cadastroUsuarioDTO' => $cadastroUsuarioDTO->toArray(),
                'erro' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Erro ao cadastrar um novo usuário'], Response::HTTP_BAD_REQUEST);
        }
    }
}
