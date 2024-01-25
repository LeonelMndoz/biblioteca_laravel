<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LibroDetalle;
use App\Models\Ejemplare;

class AddEjemplar extends Component
{
    public $open = false;
    public $ejemplar = [];
    public $mislibros;

    protected $rules = [
        'ejemplar.clave' => 'required|unique:ejemplares,clave',
        'ejemplar.librodetalle_id' => 'required',
    ];

    public function mount(){
        $this->ejemplar['statu_id'] = 1; 
    }
    
    public function add_ejemplar()
    {
        $this->validate();
        $ejemplar = new Ejemplare($this->ejemplar);
        $ejemplar->save();
        session()->flash('flash.banner','Los archivos se han subido correctamente');
        session()->flash('flash.bannerStyle','success');
        $this->reset(['ejemplar']); 
   
    }

    public function render()
    {
        $this->mislibros = LibroDetalle::get();
        return view('livewire.add-ejemplar', ['mislibros' => $this->mislibros]);
    }
}
