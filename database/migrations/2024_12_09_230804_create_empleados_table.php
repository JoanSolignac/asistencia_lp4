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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_apellido", 255); // Nombre y apellido del empleado
            $table->string("dni", 8)->unique(); // DNI del empleado único
            $table->string("fecha_nacimiento", 100); // Fecha de nacimiento del empleado
            $table->string("telefono", 30)->unique(); // Teléfono del empleado único
            $table->string("direccion", 255); // Dirección del empleado
            $table->unsignedBigInteger('idRol'); // Clave foránea hacia roles;
            $table->string("estado", 50); // Estado del empleado [activo, inactivo]
            $table->string("hora_entrada", 50); // Hora de entrada del empleado
            $table->string("hora_salida", 50); // Hora de salida del empleado
            $table->timestamps();

            // Clave foránea
            $table->foreign('idRol')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
