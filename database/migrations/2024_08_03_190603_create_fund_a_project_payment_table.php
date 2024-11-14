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
        Schema::create('fund_a_project_payment', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('donor_name');
            $table->string('donor_email')->unique();
            $table->string('phone');
            $table->string('amount_for');
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_a_project_payment');
    }
};
