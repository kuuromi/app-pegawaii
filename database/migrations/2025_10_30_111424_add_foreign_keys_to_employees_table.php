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
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('departemen_id')->after('tanggal_masuk');
            $table->unsignedBigInteger('positions_id')->after('departemen_id');

            $table->foreign('departemen_id')
                ->references('id')
                ->on('departemen')
                ->onDelete('cascade');

            $table->foreign('positions_id')
                ->references('id')
                ->on('positions')
                ->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['departemen_id']);
            $table->dropForeign(['positions_id']);
            $table->dropColumn(['departemen_id', 'positions_id']);
        });
    }
};
