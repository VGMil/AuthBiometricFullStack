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
            $table->id(); // id Primaria int No Ninguna AUTO_INCREMENT
            $table->string('username', 50)->unique(); // username Índice varchar(50) utf8mb4_0900_ai_ci No Ninguna
            $table->string('password', 255); // password varchar(255) utf8mb4_0900_ai_ci No Ninguna
            $table->string('full_name', 100); // full_name varchar(100) utf8mb4_0900_ai_ci No Ninguna
            $table->string('email', 100); // email varchar(100) utf8mb4_0900_ai_ci No Ninguna
            $table->boolean('is_admin')->default(0); // is_admin tinyint(1) Sí 0
            $table->timestamp('created_at'); // created_at timestamp
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
