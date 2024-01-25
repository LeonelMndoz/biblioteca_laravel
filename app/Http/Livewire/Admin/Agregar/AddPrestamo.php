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
        session()->flash('flash.banner','EL PRESTAMO SE REALIZO CORRECTAMENTE');
        session()->flash('flash.bannerStyle','success');
        $this->reset(['prestamo']);
        return redirect('Agregar/AddPrestamo');
    }

    public function render()
    {
        $this->usuariopr = User::get();
        $this->ejempr = Ejemplare::get();

        return view('livewire.admin.agregar.add-prestamo', ['ejempr' => $this->ejempr], ['usuariopr' => $this->ejempr]);
    }
}
