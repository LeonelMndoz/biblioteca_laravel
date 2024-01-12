<?php

namespace App\Http\Livewire\Tables;
use App\Models\User;
//SE USAN PARA LA ESTRUCTURA DE LA TABLA
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Action;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;



use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TablaUsuario extends LivewireDatatable
{

    //habilitar la opcion de checkbox opteniendo el id en la tabla
    public $hideable = 'select';

    public function builder()
    {
        return User::query();
    }

    public function columns()
    {
        return [
            //AQUI SE OBTIENE EL ID DE CADA REGISTRO
            Column::checkbox(),

            //COLUMNA DE "NOMBRE DE LIBRO"
            Column::name('name') //Llamas desde la base de datos
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Nombre del usuario'), //Como quieres que se muestre en la pag

            Column::name('email')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Correo'),

            Column::name('rol')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Rol')

            //Mostrar Portada
            /*
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
            })->label('Pdf Contenido')->unsortable()->excludeFromExport(),*/
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