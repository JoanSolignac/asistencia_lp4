<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaSalida extends Model
{
    use HasFactory;

    protected $table = 'asistencia_salidas';

    protected $fillable = ['idEmpleado', 'hora_salida', 'estado'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }
}
