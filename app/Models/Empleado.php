<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Llave primaria
    public $timestamps = false;

    protected $fillable = [
        'nombre_apellido',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'idRol',
        'estado',
        'hora_entrada',
        'hora_salida',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol');
    }

    public function user()
    {
        return $this->hasOne(EmpleadoUser::class, 'idEmpleado');
    }

    public function asistenciaEntradas()
    {
        return $this->hasMany(AsistenciaEntrada::class, 'idEmpleado');
    }

    public function asistenciaSalidas()
    {
        return $this->hasMany(AsistenciaSalida::class, 'idEmpleado');
    }
}
