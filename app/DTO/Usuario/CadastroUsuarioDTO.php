<?php

namespace App\DTO\Usuario;

use Spatie\LaravelData\Data;

class CadastroUsuarioDTO extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
        $this->password = bcrypt($this->password);
    }
}
