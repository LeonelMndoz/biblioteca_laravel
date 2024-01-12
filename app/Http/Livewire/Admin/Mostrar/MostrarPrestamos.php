<?php

namespace App\Http\Livewire\Admin\Mostrar;

use Livewire\Component;
use App\Models\Prestamo;

class MostrarPrestamos extends Component
{
    public function render()
    {
        return view('livewire.admin.mostrar.mostrar-prestamos');
    }
}
