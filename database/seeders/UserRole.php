<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\RolesyPermisos;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'AdminBiblioteca',
            'apellidop' => 'AdminBiblioteca',
            'apellidom' => 'AdminBiblioteca',
            'direccion' => 'AdminBiblioteca',
            'telefono' => 'AdminBiblioteca',
            'email' => 'adminbiblioteca@email.com',
            'password' => Hash::make('adminbibliotecapass'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'UsuarioBiblioteca',
            'apellidop' => 'UsuarioBiblioteca',
            'apellidom' => 'UsuarioBiblioteca',
            'direccion' => 'UsuarioBiblioteca',
            'telefono' => 'UsuarioBiblioteca',
            'email' => 'UsuarioBiblioteca@email.com',
            'password' => Hash::make('UsuarioBibliotecapass'),
        ])->assignRole('Usuario');
    }

    public function validetAdmin(User $user)
    {
        return $user->hasRole('Administrador'); // Cambia 'admin' al nombre de tu rol deseado
    }
}
