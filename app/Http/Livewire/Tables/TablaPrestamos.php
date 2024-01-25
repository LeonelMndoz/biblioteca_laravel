<?php

namespace App\Http\Livewire\Tables;
use App\Models\Prestamo;
use App\Models\User;
use App\Models\Ejemplare;
use Laravel\Jetstream\Contracts\UpdatesTeamNames;
//SE USAN PARA LA ESTRUCTURA DE LA TABLA
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Action;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;



use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TablaPrestamos extends LivewireDatatable
{

    //habilitar la opcion de checkbox opteniendo el id en la tabla
    public $hideable = 'select';
    public $open=0, $user_id, $fechaprestamo, $ejemplare_id, $fechadevolucion, $prestamo_id ;

    public function builder()
    {
        return Prestamo::query()->leftJoin('users','users.id','prestamos.user_id')->leftJoin('ejemplares','ejemplares.id', 'prestamos.ejemplare_id' );
    }

    public function columns()
    {
        return [
            //AQUI SE OBTIENE EL ID DE CADA REGISTRO
            Column::checkbox(),

            Column::name('users.name') //Llamas desde la base de datos
            ->defaultSort('asc')
            ->searchable()
            ->filterable()
            ->label('Nombre del usuario'),

            Column::name('fechaprestamo')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Fecha de prestamo'),

            Column::name('fechadevolucion')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Fecha de devolucion'),
            
                Column::name('ejemplares.clave')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Clave de Libro'),

                Column::callback(['id','user_id', 'fechaprestamo', 'ejemplare_id', 'fechadevolucion'], function($prestamo_id, $user_id, $fechaprestamo, $ejemplare_id,$fechadevolucion){
                    $open = $this->open;
                    $ID = $this->ID;
                    return view('livewire.admin.acciones.prestamo-acciones', ['user_id'=> $user_id, 'id' => $prestamo_id, 'open' => $open, 'ID' => $ID, 'fechaprestamo' => $fechaprestamo, 'ejemplare_id'=> $ejemplare_id, 'fechadevolucion'=> $fechadevolucion,
                    'usuario'=>User::get(), 'ejemplare' => Ejemplare::get()]);
                })->label('Acciones')->unsortable()->excludeFromExport(),

                
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

    //========================= METODO EDITAR =========================
    //===MODAL===
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
    //===MODAL===

    //===== FUNCION =====
    public function edit_ejemplares($id){
        $this -> openModalPopover($id);
        $tem=Prestamo::findOrFail($id);
        $this -> prestamo_id = $id; 
        $this -> user_id = $tem->user_id; 
        $this -> fechaprestamo = $tem->fechaprestamo; 
        $this -> fechadevolucion = $tem->fechapadevolucion;
        $this -> ejemplare_id = $tem->ejemplare_id;
    }

    public function storeEdit(){
        
        $this -> validate(['fechaprestamo' => 'required', 'fechadevolucion' => 'required', 'ejemplare_id' => 'required', 'user_id' => 'required']);


        Prestamo::updateOrCreate(['id'=> $this-> prestamo_id],[ 'user_id' => $this-> user_id, 'fechaprestamo' => $this -> fechaprestamo, 'fechadevolucion' => $this -> fechadevolucion, 'ejemplare_id' => $this -> ejemplare_id] );

        $this->closeModalPopover();
    }
    //===== FUNCION =====

}