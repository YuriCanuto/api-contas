<?php

namespace App\Repositories;

use App\DTO\Usuario\CadastroUsuarioDTO;
use App\Models\User;
use App\Repositories\Interfaces\IUserInterface;

class UserRepository implements IUserInterface
{
    public function __construct(private User $usuario) {}

    /** {@inheritdoc} */
    public function getUsuarioPeloEmail(string $email): ?User
    {
        return $this->usuario
            ->where('email', $email)
            ->first();
    }

    /** {@inheritdoc} */
    public function create(CadastroUsuarioDTO $dto): User
    {
        return $this->usuario->create($dto->toArray());
    }
}
