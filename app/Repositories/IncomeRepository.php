<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IncomeRepositoryInterface;
use App\Models\Income;
use App\DTOs\IncomeDTO;

class IncomeRepository implements IncomeRepositoryInterface
{
    public function create(IncomeDTO $incomeDTO)
    {
        return Income::create([
            'type' => $incomeDTO->type,
            'amount' => $incomeDTO->amount,
            'date' => $incomeDTO->date,
            'invoice' => $incomeDTO->invoice,
            'user_id' => $incomeDTO->user_id
        ]);
    }

    public function getByUserId($userId)
    {
        return Income::where('user_id', $userId)->get();
    }

    public function update($id, IncomeDTO $incomeDTO)
    {
        $income = Income::find($id);
        return $income->update([
            'type' => $incomeDTO->type,
            'amount' => $incomeDTO->amount,
            'date' => $incomeDTO->date,
            'invoice' => $incomeDTO->invoice,
            'user_id' => $incomeDTO->user_id
        ]);
    }

    public function delete($id)
    {
        $income = Income::find($id);
        return $income->delete();
    }

}
