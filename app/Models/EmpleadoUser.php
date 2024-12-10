<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class EmpleadoUser extends Authenticatable
{
    protected $table = 'empleados_users'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idEmpleado'; // Llave primaria
    public $timestamps = false;

    protected $fillable = [
        'idEmpleado',
        'correo',
        'password',
    ];

    // Relación con el modelo Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }
}
