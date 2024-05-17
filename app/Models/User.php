<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;


/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User",
 *     description="User model",
 *     required={"username", "email", "password"},
 *     @OA\Property(
 *         property="username",
 *         type="string",
 *         description="Its the name of the user"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="Email of the user"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         description="Password of the user"
 *     ),
 * )
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    
    protected $table = 'Users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'username', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
