<?php

namespace App\Http\Livewire\Tables;
use App\Models\LibroDetalle;
//SE USAN PARA LA ESTRUCTURA DE LA TABLA
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Action;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;



use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TablaLibro extends LivewireDatatable
{

    //habilitar la opcion de checkbox opteniendo el id en la tabla
    public $hideable = 'select';

    //variables para MODALES
    public $open = 0, $open1 = 0, $open2 = 0,$open3 = 0, $open4 = 0;


    public function builder()
    {
        return LibroDetalle::query();
    }

    //Metodos para el uso de ventanas modales para opcion de mostrar PORTADA
    public $ID2;
  public function openModalPopoverV3($id)
  {
    $this->open2 = true;
        $this->ID2=$id;
  }
  public function closeModalPopoverV3()
  {
    $this->open2 = false;
  }


  public function openModalPopoverV5($id)
  {
    $this->open2 = true;
        $this->ID2=$id;
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
        $this->ID3=$id;
  }
  public function closeModalPopoverV4()
  {
    $this->open3 = false;
  }
    //

    public function columns()
    {
        return [
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
            Column::callback(['id','portada'], function ($id,$portada) {
                $open2 = $this->open2;
                $ID2=$this->ID2;
                return view('livewire.admin.img.img-button', ['portada' => $portada,'id' => $id,
                'open2' => $open2, 'ID2' => $ID2]);
            })->label('Portada')->unsortable()->excludeFromExport(),

            //Mostrar Pdfs
            Column::callback(['id','pdf'], function ($id,$pdf) {
                $open3 = $this->open3;
                $ID3=$this->ID3;
                return view('livewire.admin.pdf.pdf-button', ['pdf' => $pdf,'id' => $id,
                'open3' => $open3, 'ID3' => $ID3]);
            })->label('Pdf Contenido')->unsortable()->excludeFromExport(),

            
        ];
    }

    //Metodo para exportacion con los datos que contiene la tabla, opciones csv,html,xlsx
    public function buildActions()
    {
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
}