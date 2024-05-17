<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowBalance`(IN userId INT)
BEGIN
    WITH IncomeDetails AS (
        SELECT 
            'Income' AS EntryType,
            type AS Description,
            amount AS Amount,
            date AS EntryDate
        FROM Income 
        WHERE user_id = userId
    ),
    ExpenseDetails AS (
        SELECT 
            'Expense' AS EntryType,
            type AS Description,
            amount AS Amount,
            date AS EntryDate
        FROM Expenses 
        WHERE user_id = userId
    ),
    TotalIncome AS (
        SELECT 
            'Total Income' AS Description,
            IFNULL(SUM(amount), 0) AS Amount
        FROM Income 
        WHERE user_id = userId
    ),
    TotalExpenses AS (
        SELECT 
            'Total Expenses' AS Description,
            IFNULL(SUM(amount), 0) AS Amount
        FROM Expenses 
        WHERE user_id = userId
    ),
    MonthlyBalance AS (
        SELECT 
            'Monthly Balance' AS Description,
            (SELECT IFNULL(SUM(amount), 0) FROM Income WHERE user_id = userId) 
            - 
            (SELECT IFNULL(SUM(amount), 0) FROM Expenses WHERE user_id = userId) 
            AS Amount
    )
    SELECT * FROM IncomeDetails
    UNION ALL
    SELECT * FROM ExpenseDetails
    UNION ALL
    SELECT NULL AS EntryType, Description, Amount, NULL AS EntryDate FROM TotalIncome
    UNION ALL
    SELECT NULL AS EntryType, Description, Amount, NULL AS EntryDate FROM TotalExpenses
    UNION ALL
    SELECT NULL AS EntryType, Description, Amount, NULL AS EntryDate FROM MonthlyBalance;
END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS ShowBalance");
    }
};
