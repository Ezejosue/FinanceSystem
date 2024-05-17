<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('income')) {
            Schema::create('income', function (Blueprint $table) {
                $table->integer('id', true);
                $table->string('type', 50);
                $table->decimal('amount', 10);
                $table->date('date');
                $table->string('invoice');
                $table->integer('user_id')->nullable()->index('user_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income');
    }
};
