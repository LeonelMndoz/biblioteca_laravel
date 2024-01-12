<?php

namespace App\Http\Livewire\Admin\Agregar;

use Livewire\Component;
use App\Models\Prestamo;
use App\Models\User;
use App\Models\Ejemplare;

class AddPrestamo extends Component
{

    public $prestamo = [];
    public $usuariopr, $ejempr;

    public function mount(){
        $this->prestamo['fechadevolucion'] = null; 
    }

    public function add_prestamo()
    {
        $newPrestamo = new Prestamo($this->prestamo);
        $newPrestamo->save();
        $this->reset(['prestamo']);
    }

    public function render()
    {
        $this->usuariopr = User::get();
        $this->ejempr = Ejemplare::get();

        return view('livewire.admin.agregar.add-prestamo', ['ejempr' => $this->ejempr], ['usuariopr' => $this->ejempr]);
    }
}
