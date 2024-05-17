<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;



class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    
    protected $table = 'Users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'username', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
