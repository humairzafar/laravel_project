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
        Schema::create('customerstable', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('name',30);
            $table->string('email',30);
            $table->enum('gender',["M","F","O"])->nullable;
            $table->text('address');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customerstable');
    }
};
