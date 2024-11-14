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
        Schema::create('endowment_support_one_year', function (Blueprint $table) {
            $table->id();$table->string('program');
            $table->string('degree');
            $table->integer('seats');
            $table->string('degree_name');
            $table->string('totalAmount');
            $table->string('donor_name');
            $table->string('donor_email')->unique();
            $table->string('phone');
            $table->text('about_partner')->nullable();
            $table->string('country')->nullable();
            $table->year('year')->nullable();
            $table->string('payments_status');
            $table->string('prove')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endowment_support_one_year');
    }
};
