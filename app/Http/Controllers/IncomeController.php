<?php

namespace App\Http\Controllers;

use App\Services\IncomeService;
use App\DTOs\IncomeDTO;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    protected $incomeService;

    public function __construct(IncomeService $incomeService)
    {
        $this->incomeService = $incomeService;
    }

    public function store(Request $request)
    {
        $incomeDTO = new IncomeDTO(
            $request->input('type'),
            $request->input('amount'),
            $request->input('date'),
            $request->input('invoice'),
            $request->input('user_id')
        );

        $income = $this->incomeService->createIncome($incomeDTO);

        return response()->json($income, 201);
    }

    public function show($userId)
    {
        $income = $this->incomeService->getIncomeByUserId($userId);

        return response()->json($income);
    }

    // Other controller methods
}
