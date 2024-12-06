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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id(); 
            $table->decimal('amount', 5, 2); 
            $table->dateTime('date_start');
            $table->dateTime('date_end'); 
            $table->string('code')->unique(); 
            $table->enum('status', ['Active', 'Deactivate'])->default('Active'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
