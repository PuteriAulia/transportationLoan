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
        Schema::table('fuel_refils', function (Blueprint $table) {
            $table->unsignedBigInteger('company_loc_id')->after('date');
            $table->foreign('company_loc_id')->references('id')->on('company_locs')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fuel_refils', function (Blueprint $table) {
            $table->dropForeign(['company_loc_id']);
            $table->dropColumn('company_loc_id');
        });
    }
};
