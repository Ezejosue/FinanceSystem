<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\DTOs\LoginDTO;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{
    public function authenticate(LoginDTO $loginDTO)
    {
        $user = User::where('email', $loginDTO->email)->first();

        if ($user) {
            $passwordMatch = Hash::check($loginDTO->password, $user->password);
            if ($passwordMatch) {
                return $user;
            }
        }

        return null;
    }
}
