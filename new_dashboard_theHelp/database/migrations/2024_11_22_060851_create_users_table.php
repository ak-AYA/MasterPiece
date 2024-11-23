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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->string('firstName');
            $table->string('lastName')->default('')->change();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('identity_number');
            $table->string('location');
            $table->unsignedBigInteger('role_id');  // Foreign key to roles table
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
