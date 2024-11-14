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
        Schema::table('openfund_students', function (Blueprint $table) {
            $table->boolean('make_pledge')->default(1)->after('remarks');
            $table->boolean('payment_approved')->default(1)->after('make_pledge');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('openfund_students', function (Blueprint $table) {
            $table->dropColumn('make_pledge');
            $table->dropColumn('payment_approved');
        });
    }
};
