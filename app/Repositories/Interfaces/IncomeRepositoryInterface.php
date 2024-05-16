<?php

namespace App\Repositories\Interfaces;

use App\DTOs\IncomeDTO;

interface IncomeRepositoryInterface
{
    public function create(IncomeDTO $incomeDTO);
    public function getByUserId($userId);
    // Other CRUD methods
}
