<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaEntrada extends Model
{
    use HasFactory;

    protected $table = 'asistencia_entradas';

    protected $fillable = ['idEmpleado', 'hora_entrada', 'estado'];

    protected $casts = [
        'hora_entrada' => 'datetime',
    ];
    
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }
}
