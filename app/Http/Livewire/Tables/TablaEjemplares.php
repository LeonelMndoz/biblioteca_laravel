<?php

namespace App\Http\Livewire\Tables;
use App\Models\Ejemplare;
//SE USAN PARA LA ESTRUCTURA DE LA TABLA
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Action;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;



use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TablaEjemplares extends LivewireDatatable
{

    //habilitar la opcion de checkbox opteniendo el id en la tabla
    public $hideable = 'select';
    public $clave,$statu_id,$librodetalle_id, $open = 0;


    public function builder()
    {
        return Ejemplare::query()->leftJoin('librodetalles','librodetalles.id','ejemplares.librodetalle_id')      ->leftJoin('paquetes', 'paquetes.id', 'ejemplares.statu_id');

    }

    public function columns()
    {
        return [
            //AQUI SE OBTIENE EL ID DE CADA REGISTRO
            Column::checkbox(),

            //COLUMNA DE "NOMBRE DE LIBRO"
            Column::name('clave') //Llamas desde la base de datos
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Clave del libro'), //Como quieres que se muestre en la pag

            Column::name('s.dispo')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Disponibilidad'),

            Column::name('librodetalles.titulo')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Libro al que pertenece'),

            Column::callback(['id','clave', 'statu_id', 'librodetalle_id'], function($id, $clave, $statu_id, $librodetalle_id){
                $open = $this->open;
                $ID = $this->ID;
                return view('livewire.admin.acciones.ejemplar-acciones', ['clave'=> $clave, 'id' => $id, 'open' => $open, 'ID' => $ID, 'statu_id' => $statu_id, 'librodetalle_id'=> $librodetalle_id]);
            })->label('Acciones'),

            
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
    
            //------------------------- FUNCION ELIMINAR --------------------

            public function delete_ejemplar($id){
                Ejemplare::destroy($id);
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
}

