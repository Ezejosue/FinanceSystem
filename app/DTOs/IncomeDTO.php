<?php

namespace App\DTOs;

class IncomeDTO
{
    public $entryType;
    public $description;
    public $amount;
    public $entryDate;

    public function __construct($entryType, $description, $amount, $entryDate)
    {
        $this->entryType = $entryType;
        $this->description = $description;
        $this->amount = $amount;
        $this->entryDate = $entryDate;
    }
}
