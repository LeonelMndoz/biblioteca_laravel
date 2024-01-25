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
    public $user_id, $name,$email, $open = 0, $open1 = 0;
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

            
            Column::callback(['id','name', 'email'] , function($id, $name, $email,){
                $open = $this->open;
                $ID = $this->ID;
                $open1 = $this->open1;
                $ID1 = $this->ID1;
                return view('livewire.admin.acciones.user-acciones', ['name' => $name,'id' => $id,
                'open' => $open, 'email' => $email, 'ID'=> $ID, 'open1' => $open1, 'ID1'=> $ID1]);
                
            })->label('Acciones'),
            
        ];
    }

    //Metodos para el uso de ventanas modales para opcion de borrar
    

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
    public function delete_user($id){
        User::destroy($id);
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

//========================= METODO EDITAR =========================
    //===MODAL===
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
    //===MODAL===

    //===== FUNCION =====
    public function edit_user($id){
        $this -> openModalPopover1($id);
        $tem=User::findOrFail($id);
        $this -> user_id = $id; 
        $this -> name = $tem->name; 
        $this -> email = $tem->email; 
    }

    public function storeEdit(){
        
        $this -> validate(['user_id' => 'required', 'name' => 'required', 'email' => 'required']);

        User::updateOrCreate(['id'=> $this-> user_id],[ 'name' => $this-> name, 'email' => $this -> email] );

        $this->closeModalPopover();
    }

}