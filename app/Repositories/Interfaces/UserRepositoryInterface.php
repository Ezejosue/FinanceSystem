<?php

namespace App\Repositories\Interfaces;

use App\DTOs\LoginDTO;

interface UserRepositoryInterface
{
    public function authenticate(LoginDTO $loginDTO);
}
