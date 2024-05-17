<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\DTOs\LoginDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginDTO $loginDTO)
    {
        $user = $this->userRepository->authenticate($loginDTO);

        if ($user) {
            $token = $user->createToken('authToken')->plainTextToken;
            return ['user' => $user, 'token' => $token];
        }

        return null;
    }
}
