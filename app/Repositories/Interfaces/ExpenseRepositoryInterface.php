<?php

namespace App\Repositories\Interfaces;

use App\DTOs\ExpenseDTO;

interface ExpenseRepositoryInterface
{
    public function create(ExpenseDTO $ExpenseDTO);
    public function getByUserId($userId);
    public function update($id, ExpenseDTO $ExpenseDTO);
    public function delete($id);
}
