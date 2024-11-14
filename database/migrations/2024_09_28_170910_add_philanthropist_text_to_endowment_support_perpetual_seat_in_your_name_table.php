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
        Schema::table('endowment_support_perpetual_seat_in_your_name', function (Blueprint $table) {
            $table->text('philanthropist_text')->after('about_partner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('endowment_support_perpetual_seat_in_your_name', function (Blueprint $table) {
            $table->dropColumn('philanthropist_text');
        });
    }
};
