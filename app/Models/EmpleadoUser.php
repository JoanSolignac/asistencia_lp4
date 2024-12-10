<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EmpleadoUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'empleados_users'; // Nombre de la tabla en la base de datos.
    protected $primaryKey = 'id'; // Llave primaria real de la tabla.
    public $timestamps = false;

    protected $fillable = [
        'idEmpleado', // Llave foránea hacia empleados.
        'correo',
        'password',
    ];

    // Relación con el modelo Empleado.
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }
}
