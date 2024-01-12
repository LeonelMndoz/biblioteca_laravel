<?php

namespace App\Http\Livewire\Admin\Agregar;

use Livewire\Component;
use App\Models\User;
class AddUsuario extends Component
{
    public $user_=[];

    public function add_user(){
        $user_ = new User($this->user_);
        
        $user_->save();
        
        $this->user_=[];
    }
    public function render()
    {
        return view('livewire.admin.agregar.add-usuario');
    }
}
