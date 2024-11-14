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
        Schema::create('support_scholar_payment', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('donor_name');
            $table->string('donor_email')->unique();
            $table->string('duration');
            $table->decimal('amount', 10, 2);
            $table->string('prove');
            $table->boolean('payment_approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_scholar_payment');
    }
};
