<?php

namespace App\Http\Livewire\Roles;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use Livewire\Component;

class Crear extends Component
{
    public $allPermisos, $role ;
    public $permisos = [];

    public function add_role()
    {   
        //dd($this->role);    
        $this->validate([
            'role' => 'required',
        ]);
        Role::create(["name" => $this->role, 'guard_name' => 'web'])
        ->syncPermissions($this->permisos);
        session()->flash('flash.banner','EL ROL SE AGREGO CORRECTAMENTE');
        session()->flash('flash.bannerStyle','success');
        return redirect('Roles/Crear');
        
    }
    public function mount()
    {
        $this->allPermisos = Permission::all();
    }
    public function render()
    {
        return view('livewire.roles.crear');
    }
}
