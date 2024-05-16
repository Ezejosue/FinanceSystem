<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Balance",
 *     type="object",
 *     title="Balance",
 *     description="Balance model",
 *     required={"entryType", "description", "amount", "entryDate"},
 *     @OA\Property(
 *         property="entryType",
 *         type="string",
 *         description="Type of the entry"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Description of the entry"
 *     ),
 *     @OA\Property(
 *         property="amount",
 *         type="number",
 *         format="float",
 *         description="Amount of the entry"
 *     ),
 *     @OA\Property(
 *         property="entryDate",
 *         type="string",
 *         format="date",
 *         description="Date of the entry"
 *     )
 * )
 */
class Balance extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'entryType',
        'description',
        'amount',
        'entryDate'
    ];

}
