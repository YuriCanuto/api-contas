<?php

namespace App\Repositories\Interfaces;

use App\DTO\Usuario\CadastroUsuarioDTO as UsuarioCadastroUsuarioDTO;
use App\Models\User;
use Modules\Auth\DTO\CadastroUsuarioDTO;

interface IUserInterface
{
    public function getUsuarioPeloEmail(string $email): ?User;

    /**
     * @param  CadastroUsuarioDTO  $cadastroUsuarioDTO
     */
    public function create(UsuarioCadastroUsuarioDTO $cadastroUsuarioDTO): User;
}
