<?php

namespace App\DTOs;

class ExpenseDTO
{
    public $type;
    public $amount;
    public $date;
    public $invoice;
    public $user_id;

    public function __construct($type, $amount, $date, $invoice, $user_id)
    {
        $this->type = $type;
        $this->amount = $amount;
        $this->date = $date;
        $this->invoice = $invoice;
        $this->user_id = $user_id;
    }
}
