<?php

namespace App\Repositories\Interfaces;
use App\DTOs\BalanceDTO;

interface BalanceRepositoryInterface
{
    public function getBalanceByUserId($userId);
}
