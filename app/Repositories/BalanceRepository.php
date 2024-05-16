<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BalanceRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Balance;
use App\DTOs\BalanceDTO;


class BalanceRepository implements BalanceRepositoryInterface
{
    public function getBalanceByUserId($userId)
    {
        $results = DB::select('CALL ShowBalance(?)', [$userId]);

        return array_map(function($result) {
            return new Balance([
                'entryType' => $result->EntryType,
                'description' => $result->Description,
                'amount' => $result->Amount,
                'entryDate' => $result->EntryDate
            ]);
        }, $results);
    }
}
