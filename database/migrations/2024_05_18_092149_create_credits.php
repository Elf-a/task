<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        


        Schema::create('credits', function (Blueprint $table) {

            $table->charset('utf8mb4');
            $table->id();
            $table->string('unique_credit_id', 30)->unique(); // this is uniq ID only for the visible
            $table->string('credit_borrower_name', 120)->nullable(false);
            $table->decimal('credit_amount', 8, 2)->nullable(false);
            $table->decimal('credit_total_repayment_amount', 8, 2)->nullable(false);
            $table->decimal('credit_interest', 8, 2)->nullable(false);
            $table->tinyInteger('credit_period')->nullable(false);
            $table->date('end_date_credit')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
