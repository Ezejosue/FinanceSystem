<?php

namespace App\Services;

use App\Repositories\Interfaces\IncomeRepositoryInterface;
use App\DTOs\IncomeDTO;

class IncomeService
{
    protected $incomeRepository;

    public function __construct(IncomeRepositoryInterface $incomeRepository)
    {
        $this->incomeRepository = $incomeRepository;
    }

    public function createIncome(IncomeDTO $incomeDTO)
    {
        return $this->incomeRepository->create($incomeDTO);
    }

    public function getIncomeByUserId($userId)
    {
        return $this->incomeRepository->getByUserId($userId);
    }

    // Other business logic methods
}
