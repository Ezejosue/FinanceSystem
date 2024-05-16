<?php

namespace App\Services;

use App\Repositories\Interfaces\BalanceRepositoryInterface;
use App\DTOs\BalanceDTO;

class BalanceService
{
    protected $balanceRepository;

    public function __construct(BalanceRepositoryInterface $balanceRepository)
    {
        $this->balanceRepository = $balanceRepository;
    }

    public function getBalanceByUserId($userId)
    {
        return $this->balanceRepository->getBalanceByUserId($userId);
    }
}
