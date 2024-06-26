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

    /**
     * @OA\Post(
     *     path="/api/income",
     *     summary="Create a new income record",
     *     tags={"Income"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"type","amount","date","invoice","user_id"},
     *             @OA\Property(property="type", type="string", example="Salary"),
     *             @OA\Property(property="amount", type="number", format="float", example=1000.00),
     *             @OA\Property(property="date", type="string", format="date", example="2023-05-01"),
     *             @OA\Property(property="invoice", type="string", example="INV123456"),
     *             @OA\Property(property="user_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Income record created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Income")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
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


     /**
     * @OA\Get(
     *     path="/api/income/{userId}",
     *     summary="Get Income by User ID",
     *     tags={"Income"},
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
     *             @OA\Items(ref="#/components/schemas/Income")
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
        $income = $this->incomeService->getIncomeByUserId($userId);

        return response()->json($income);
    }

    /**
     * @OA\Put(
     *     path="/api/income/{id}",
     *     summary="Update an existing income record",
     *     tags={"Income"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the income record to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"type","amount","date","invoice","user_id"},
     *             @OA\Property(property="type", type="string", example="Salary"),
     *             @OA\Property(property="amount", type="number", format="float", example=1000.00),
     *             @OA\Property(property="date", type="string", format="date", example="2023-05-01"),
     *             @OA\Property(property="invoice", type="string", example="INV123456"),
     *             @OA\Property(property="user_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Income record updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Income")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
     */
    public function update($id, Request $request)
    {
        $incomeDTO = new IncomeDTO(
            $request->input('type'),
            $request->input('amount'),
            $request->input('date'),
            $request->input('invoice'),
            $request->input('user_id')
        );

        $income = $this->incomeService->updateIncome($id, $incomeDTO);

        return response()->json($income);
    }


    /**
     * @OA\Delete(
     *     path="/api/income/{id}",
     *     summary="Delete an income record",
     *     tags={"Income"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the income record to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Income record deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
     */
    public function destroy($id)
    {
        $this->incomeService->deleteIncome($id);

        return response()->json(null, 204);
    }
}
