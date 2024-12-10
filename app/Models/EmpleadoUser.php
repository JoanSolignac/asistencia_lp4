<?php

// EmpleadoUser.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoUser extends Model
{
    use HasFactory;

    protected $table = 'empleados_users';
    
    // Asegúrate de que 'idEmpleado' esté en $fillable
    protected $fillable = ['correo', 'password', 'idEmpleado'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }
}
