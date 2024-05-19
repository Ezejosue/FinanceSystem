<?php

namespace App\Repositories\Interfaces;

use App\DTOs\IncomeDTO;

interface IncomeRepositoryInterface
{
    public function create(IncomeDTO $incomeDTO);
    public function getByUserId($userId);
    public function update($id, IncomeDTO $incomeDTO);
    public function delete($id);
    // Other CRUD methods
}
