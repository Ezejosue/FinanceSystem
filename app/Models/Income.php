<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Income",
 *     type="object",
 *     title="Income",
 *     description="Income model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the income record"
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         description="Type of income"
 *     ),
 *     @OA\Property(
 *         property="amount",
 *         type="number",
 *         format="float",
 *         description="Amount of income"
 *     ),
 *     @OA\Property(
 *         property="date",
 *         type="string",
 *         format="date",
 *         description="Date of income"
 *     ),
 *     @OA\Property(
 *         property="invoice",
 *         type="string",
 *         description="Invoice number"
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         description="ID of the user associated with the income"
 *     )
 * )
 */
class Income extends Model
{
    use HasFactory;

    protected $table = 'Income';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'type',
        'amount',
        'date',
        'invoice',
        'user_id'
    ];
}
