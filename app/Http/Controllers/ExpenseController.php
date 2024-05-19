<?php

namespace App\Http\Controllers;

use App\Services\ExpenseService;
use App\DTOs\ExpenseDTO;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    protected $expenseService;

    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    /**
     * @OA\Post(
     *     path="/api/expense",
     *     summary="Create a new expense record",
     *     tags={"Expense"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"type","amount","date","invoice","user_id"},
     *             @OA\Property(property="type", type="string", example="Groceries"),
     *             @OA\Property(property="amount", type="number", format="float", example=150.75),
     *             @OA\Property(property="date", type="string", format="date", example="2023-05-01"),
     *             @OA\Property(property="invoice", type="string", example="INV987654"),
     *             @OA\Property(property="user_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Expense record created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Expense")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $expenseDTO = new ExpenseDTO(
            $request->input('type'),
            $request->input('amount'),
            $request->input('date'),
            $request->input('invoice'),
            $request->input('user_id')
        );

        $expense = $this->expenseService->createExpense($expenseDTO);

        return response()->json($expense, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/expense/{userId}",
     *     summary="Get Expenses by User ID",
     *     tags={"Expense"},
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         description="User ID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Expense")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
     */
    public function show($userId)
    {
        $expense = $this->expenseService->getExpenseByUserId($userId);

        return response()->json($expense);
    }

    /**
     * @OA\Put(
     *     path="/api/expense/{id}",
     *     summary="Update an existing expense record",
     *     tags={"Expense"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the expense record to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"type","amount","date","invoice","user_id"},
     *             @OA\Property(property="type", type="string", example="Groceries"),
     *             @OA\Property(property="amount", type="number", format="float", example=150.75),
     *             @OA\Property(property="date", type="string", format="date", example="2023-05-01"),
     *             @OA\Property(property="invoice", type="string", example="INV987654"),
     *             @OA\Property(property="user_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Expense record updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Expense")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
     */
    public function update($id, Request $request)
    {
        $expenseDTO = new ExpenseDTO(
            $request->input('type'),
            $request->input('amount'),
            $request->input('date'),
            $request->input('invoice'),
            $request->input('user_id')
        );

        $expense = $this->expenseService->updateExpense($id, $expenseDTO);

        return response()->json($expense);
    }

    /**
     * @OA\Delete(
     *     path="/api/expense/{id}",
     *     summary="Delete an expense record",
     *     tags={"Expense"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the expense record to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Expense record deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
     */
    public function destroy($id)
    {
        $this->expenseService->deleteExpense($id);

        return response()->json(null, 204);
    }
}
