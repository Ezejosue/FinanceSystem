<?php

namespace App\Services;

use App\Repositories\Interfaces\ExpenseRepositoryInterface;
use App\DTOs\ExpenseDTO;

class ExpenseService
{
    protected $expenseRepository;

    public function __construct(ExpenseRepositoryInterface $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    public function createExpense(ExpenseDTO $expenseDTO)
    {
        return $this->expenseRepository->create($expenseDTO);
    }

    public function getExpenseByUserId($userId)
    {
        return $this->expenseRepository->getByUserId($userId);
    }

    public function updateExpense($id, ExpenseDTO $expenseDTO)
    {
        return $this->expenseRepository->update($id, $expenseDTO);
    }

    public function deleteExpense($id)
    {
        return $this->expenseRepository->delete($id);
    }

    

    // Other business logic methods
}
