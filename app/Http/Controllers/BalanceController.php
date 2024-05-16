<?php

namespace App\Http\Controllers;

use App\Services\BalanceService;
use App\DTOs\BalanceDTO;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Finance Control API",
 *      description="API documentation for Finance Control Application",
 *      @OA\Contact(
 *          email="admin@example.com"
 *      ),
 * )
 */
class BalanceController extends Controller
{
    protected $balanceService;

    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }


     /**
     * @OA\Get(
     *     path="/api/balance/{userId}",
     *     summary="Get Balance by User ID",
     *     tags={"Balance"},
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
     *             @OA\Items(ref="#/components/schemas/Balance")
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
        $balance = $this->balanceService->getBalanceByUserId($userId);

        return response()->json($balance);
    }
}
