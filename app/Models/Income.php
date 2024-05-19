<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function updateIncome($data)
    {
        return $this->update($data);
    }

    public function deleteIncome()
    {
        return $this->delete();
    }
}
