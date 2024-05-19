<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ExpenseRepositoryInterface;
use App\Models\Expense;
use App\DTOs\ExpenseDTO;

class ExpenseRepository implements ExpenseRepositoryInterface
{
    public function create(ExpenseDTO $ExpenseDTO)
    {
        return Expense::create([
            'type' => $ExpenseDTO->type,
            'amount' => $ExpenseDTO->amount,
            'date' => $ExpenseDTO->date,
            'invoice' => $ExpenseDTO->invoice,
            'user_id' => $ExpenseDTO->user_id
        ]);
    }

    public function getByUserId($userId)
    {
        return Expense::where('user_id', $userId)->get();
    }

    public function update($id, ExpenseDTO $ExpenseDTO)
    {
        $expense = Expense::find($id);
        return $expense->update([
            'type' => $ExpenseDTO->type,
            'amount' => $ExpenseDTO->amount,
            'date' => $ExpenseDTO->date,
            'invoice' => $ExpenseDTO->invoice,
            'user_id' => $ExpenseDTO->user_id
        ]);
    }

    public function delete($id)
    {
        $expense = Expense::find($id);
        return $expense->delete();
    }
    

}
