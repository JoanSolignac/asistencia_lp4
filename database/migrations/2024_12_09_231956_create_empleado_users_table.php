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
        Schema::create('empleados_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idEmpleado');
            $table->string('correo', 255)->unique();
            $table->string('password');
            $table->timestamps();

            // Relación con empleados
            $table->foreign('idEmpleado')->references('id')->on('empleados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados_users');
    }
};
