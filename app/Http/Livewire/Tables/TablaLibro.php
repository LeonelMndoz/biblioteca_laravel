<?php

namespace App\Http\Livewire\Tables;

use App\Models\LibroDetalle;
//SE USAN PARA LA ESTRUCTURA DE LA TABLA
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Action;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Database\Seeders\UserRole;




use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TablaLibro extends LivewireDatatable
{

    use WithFileUploads;

    //habilitar la opcion de checkbox opteniendo el id en la tabla
    public $hideable = 'select';

    //variables para MODALES
    public $open = 0, $open1 = 0, $open2 = 0, $open3 = 0, $open4 = 0;
    public $libro_id, $titulo, $autor, $añopublicacion, $editorial, $existencia;
    public $subir_portada, $subir_pdf, $portada, $pdf;

    public function builder()
    {
        return LibroDetalle::query();
    }

    //Metodos para el uso de ventanas modales para opcion de mostrar PORTADA
    public $ID2;
    public function openModalPopoverV3($id)
    {
        $this->open2 = true;
        $this->ID2 = $id;
    }
    public function closeModalPopoverV3()
    {
        $this->open2 = false;
    }


    public function openModalPopoverV5($id)
    {
        $this->open2 = true;
        $this->ID2 = $id;
    }
    public function closeModalPopoverV5()
    {
        $this->open2 = false;
    }
    //

    //Metodos para el uso de ventanas modales para opcion de mostrar PDF / 
    public $ID3;
    public function openModalPopoverV4($id)
    {
        $this->open3 = true;
        $this->ID3 = $id;
    }
    public function closeModalPopoverV4()
    {
        $this->open3 = false;
    }

    public function confUser(){
        $user = Auth::user();
        return $user;

    }
    //

    public function columns()
    {
        $columns = [
            //AQUI SE OBTIENE EL ID DE CADA REGISTRO
            Column::checkbox(),

            //COLUMNA DE "NOMBRE DE LIBRO"
            Column::name('titulo') //Llamas desde la base de datos
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Nombre del Libro'), //Como quieres que se muestre en la pag

            Column::name('autor')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Autor'),

            Column::name('añopublicacion')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Año de publicacion'),

            Column::name('editorial')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Editorial'),

            Column::name('existencia')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Existencia'),

            //Mostrar Portada
            Column::callback(['id', 'portada'], function ($id, $portada) {
                $open2 = $this->open2;
                $ID2 = $this->ID2;
                return view('livewire.admin.img.img-button', [
                    'portada' => $portada, 'id' => $id,
                    'open2' => $open2, 'ID2' => $ID2
                ]);
            })->label('Portada')->unsortable()->excludeFromExport(),

            //Mostrar Pdfs
            Column::callback(['id', 'pdf'], function ($id, $pdf) {
                $open3 = $this->open3;
                $ID3 = $this->ID3;
                return view('livewire.admin.pdf.pdf-button', [
                    'pdf' => $pdf, 'id' => $id,
                    'open3' => $open3, 'ID3' => $ID3
                ]);
            })->label('Pdf Contenido')->unsortable()->excludeFromExport(),
            
        ];

        $columnasAD=[
            //AQUI SE OBTIENE EL ID DE CADA REGISTRO
            Column::checkbox(),

            //COLUMNA DE "NOMBRE DE LIBRO"
            Column::name('titulo') //Llamas desde la base de datos
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Nombre del Libro'), //Como quieres que se muestre en la pag

            Column::name('autor')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Autor'),

            Column::name('añopublicacion')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Año de publicacion'),

            Column::name('editorial')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Editorial'),

            Column::name('existencia')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Existencia'),

            //Mostrar Portada
            Column::callback(['id', 'portada'], function ($id, $portada) {
                $open2 = $this->open2;
                $ID2 = $this->ID2;
                return view('livewire.admin.img.img-button', [
                    'portada' => $portada, 'id' => $id,
                    'open2' => $open2, 'ID2' => $ID2
                ]);
            })->label('Portada')->unsortable()->excludeFromExport(),

            //Mostrar Pdfs
            Column::callback(['id', 'pdf'], function ($id, $pdf) {
                $open3 = $this->open3;
                $ID3 = $this->ID3;
                return view('livewire.admin.pdf.pdf-button', [
                    'pdf' => $pdf, 'id' => $id,
                    'open3' => $open3, 'ID3' => $ID3
                ]);
            })->label('Pdf Contenido')->unsortable()->excludeFromExport(),
            Column::callback(['id', 'titulo', 'autor', 'añopublicacion', 'editorial', 'existencia', 'portada', 'pdf'], function ($id, $titulo, $autor, $añopublicacion, $editorial, $existencia, $portada, $pdf) {
                $open = $this->open;
                $open1 = $this->open1;
                $ID = $this->ID;
                $ID1 = $this->ID1;
                $subir_pdf = $this->subir_pdf;
                $subir_portada = $this->subir_portada;
                
                return view('livewire.admin.acciones.libro-acciones', ['titulo' => $titulo, 'id' => $id, 'open' => $open, 'open1' => $open1, 'autor' => $autor, 'añopublicacion' => $añopublicacion, 'editorial' => $editorial, 'existencia' => $existencia, 'ID' => $ID, 'ID1' => $ID1, 'portada' => $portada, 'pdf' => $pdf, 'subir_portada' => $subir_portada, 'subir_pdf' => $subir_pdf]);
            })->label('Acciones')->unsortable()->excludeFromExport()
            
        ];
        
        if(app(UserRole::class)->validetAdmin($this->confUser())){
            return $columnasAD;
        }
        else{
            return $columns;
        }
        
    }

  

    //Metodo para exportacion con los datos que contiene la tabla, opciones csv,html,xlsx
    public function buildActions()
    {
        if (app(UserRole::class)->validetAdmin($this->confUser())) {
            return [
                Action::groupBy('Opciones de Exportación', function () {
                    return [
                        Action::value('csv')->label('Exportar a CSV')->export('Reporte_Libros.csv')->styles($this->exportStyles),
                        Action::value('html')->label('Exportar a HTML')->export('Reporte_Libros.html')->styles($this->exportStyles),
                        Action::value('xlsx')->label('Exportar a XLSX')->export('Reporte_Libros.xlsx')->styles($this->exportStyles)
                    ];
                }),
            ];
        }

        return [];
    }

    //Estilos basicos que se dieron a los archivos de exportacion
    public function getExportStylesProperty()
    {
        return
            [
                '1' => [
                    'fill' =>
                    [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['argb' => '305496']
                    ],
                    'font' =>
                    [
                        'bold' => true,
                        'fontType' => Font::UNDERLINE_NONE,
                        'color' => ['argb' => 'FFFFFFFF']
                    ],
                ]
            ];
    }

    //------------------------- FUNCION ELIMINAR --------------------

    public function delete_libro($id)
    {
        LibroDetalle::destroy($id);
    }

    public $ID;
    public function openModalPopover($id)
    {
        $this->open = true;
        $this->ID = $id;
    }
    public function closeModalPopover()
    {
        $this->open = false;
    }

    //------------------------- FUNCION ELIMINAR --------------------

    //------------------------- FUNCION EDITAR --------------------

    public function editar_libro($id)
    {
        LibroDetalle::destroy($id);
    }

    public $ID1;
    public function openModalPopover1($id)
    {
        $this->open1 = true;
        $this->ID1 = $id;
    }
    public function closeModalPopover1()
    {
        $this->open1 = false;
    }

    //FUNCION
    public function edit_libro($id)
    {
        $this->openModalPopover1($id);
        $tem = LibroDetalle::findOrFail($id);
        $this->libro_id = $id;
        $this->titulo = $tem->titulo;
        $this->autor = $tem->autor;
        $this->añopublicacion = $tem->añopublicacion;
        $this->editorial = $tem->editorial;
        $this->existencia = $tem->existencia;
        $this->portada = $tem->portada;
        $this->pdf = $tem->pdf;

        $this->subir_portada = null;
        $this->subir_pdf = null;
    }

    public function storeEdit()
    {

        $this->validate(['libro_id' => 'required', 'titulo' => 'required', 'autor' => 'required', 'añopublicacion' => 'required', 'editorial' => 'required', 'existencia' => 'required',]);

        if (isset($this->subir_portada)) {
            $this->subir_portada->storeAs('portadas', $this->titulo . "_portada.png", 'subirdocs');
            $this->portada = "portadas/" . $this->titulo . "_portada.png";
        }

        //Si $this->portada1 no está definido o es nulo: 
        else {
            if (empty($this->subir_portada)) {
                $this->portada = "storage/LogoCategoria/sin-imagen.jpg";
            }
        }

        //Verifica si la propiedad $this->portada1 está definida y no es nula 
        if (isset($this->subir_pdf)) {
            $this->subir_pdf->storeAs('pdfs', $this->titulo . "conten.pdf", 'subirdocs');
            $this->pdf = "pdfs/" . $this->titulo . "conten.pdf";
        }
        //Si $this->portada1 no está definido o es nulo: 
        else {
            if (empty($this->subir_pdf)) {
                $this->pdf = "storage/LogoCategoria/sin-imagen.jpg";
            }
        }

        LibroDetalle::updateOrCreate(
            ['id' => $this->libro_id],
            [
                'titulo' => $this->titulo,
                'autor' => $this->autor,
                'añopublicacion' => $this->añopublicacion,
                'editorial' => $this->editorial,
                'existencia' => $this->existencia,
                'portada' => $this->portada,
                'pdf' => $this->pdf
            ]
        );

        $this->closeModalPopover();
    }

    //------------------------- FUNCION EDITAR --------------------

}
