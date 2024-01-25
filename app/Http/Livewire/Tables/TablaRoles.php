<?php

namespace App\Http\Livewire\Tables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Action;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TablaRoles extends LivewireDatatable
{
    public  $name, $guard_name, $open, $open1, $allPermisos ,$checkPermission=[];
    public function builder()
    {
        $this->allPermisos = Permission::all();

        return Role::query();
    }


    public function columns()
    {
        return[
            
            Column::checkbox(),

            Column::name('name')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->label('Nombre del rol'),

                Column::callback(['id','name', 'guard_name'] , function($id, $name, $guard_name,){
                    $open = $this->open;
                    $ID = $this->ID;
                    $open1 = $this->open1;
                    $ID1 = $this->ID1;
                    return view('livewire.admin.acciones.role-acciones', ['name' => $name,'id' => $id, 'open' => $open, 'guard_name' => $guard_name, 'ID'=> $ID, 'open1' => $open1, 'ID1'=> $ID1]);
                    
                })->label('Acciones'),

        ];
    }

    //------------------------- FUNCION ELIMINAR --------------------
        public function delete_role($id){
            Role::destroy($id);
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
    public function edit_rol(Role $role){
        $Permisos = Permission::all();
        $havePermission=$role->permissions()->get();
        foreach($Permisos as $permission){
            if($havePermission->contains($permission)){
                $this->checkPermission[$permission->name]['check']=true;
            }else{
                $this->checkPermission[$permission->name]['check'] = false;
            }
            $this->checkPermission[$permission->name]['id'] = $permission->id;
        }
    }

    public function storeEdit(){
        
        $this -> validate(['id' => 'required', 'name' => 'required', 'email' => 'required']);

        Role::updateOrCreate(['id'=> $this-> id],[ 'name' => $this-> name, 'guard_name' => $this -> guard_name] );

        $this->closeModalPopover();
    }

    
}