<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\LibroDetalle ;
use Livewire\WithFileUploads;

class Inicio extends Component
{
    use WithFileUploads;   
    public $milibro=[], $portada, $pdf;

    protected $rules = [
        'milibro.titulo'=> 'required|unique:libros, titulo',
        'milibro.autor'=> 'required',
        'milibro.añopublicacion'=> 'required',
        'milibro.editorial'=> 'required',
        'milibro.existencia'=> 'required',
        'portada'=> 'required|image',
        'pdf'=> 'required|mimes:pdf',

    ];


    public function render()
    {
        return view('livewire.admin.inicio');
    }

    public function guardar_libro(){
        $this->portada->storeAs('portadas',$this->milibro['titulo']."_portada.png", 'subirdocs');
        $this->milibro['portada']="portadas/".$this->milibro['titulo']."_portada.png";
        $this->pdf->storeAs('pdfs',$this->milibro['titulo']."_pdf.pdf", 'subirdocs');
        $this->milibro['pdf']="pdfs/".$this->milibro['titulo']."_pdf.pdf";

        $guardar_libro = new LibroDetalle($this->milibro);
        $guardar_libro->save();
        
        $this->milibro=[];
        session()->flash('flash.banner','Los archivos se han subido correctamente');
        session()->flash('flash.bannerStyle','success');
        return redirect('Inicio');
    }
}
