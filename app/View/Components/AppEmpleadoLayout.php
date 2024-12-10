<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppEmpleadoLayout extends Component
{
    /**
     * Renderiza la vista del layout de empleado.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app-empleado'); // Asegúrate de que esta ruta sea correcta.
    }
}
