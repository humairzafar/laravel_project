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
        Schema::table('customerstable', function (Blueprint $table) {
            $table->string('gender', 10)->change(); // or longer if needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customerstable', function (Blueprint $table) {
            $table->string('gender', 1)->change(); // or revert to previous type
            $table->dropTimestamps();
        });
    }
};
