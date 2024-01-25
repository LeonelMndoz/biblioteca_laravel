<?php

namespace App\Http\Livewire\Admin\Agregar;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AddUsuario extends Component
{
    public $user_=[], $roles, $rol_user;

    public function mount(){
        $this->roles = Role::get();
    }

    public function add_user(){
        $user_ = new User($this->user_);
        $user_->password = Hash::make($user_->password);
        $user_->assignRole($this->rol_user);
        $user_->save();
        session()->flash('flash.banner','EL USUARIO SE AGREGO CORRECTAMENTE');
        session()->flash('flash.bannerStyle','success');
        return redirect('Agregar/AddUsuario');
        

    }
    public function render()
    {
        return view('livewire.admin.agregar.add-usuario');
    }
}
