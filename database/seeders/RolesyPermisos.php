<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//IMPORTANTE
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesyPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creacion de roles
        $role1=Role::create(["name"=> "Administrador"]);
        $role2=Role::create(["name"=> "Usuario"]);

        Permission::create(["name"=> "Agregar libro"])->syncRoles([$role1]);
        Permission::create(["name"=> "Agregar Usuario",])->syncRoles([$role1]);
        Permission::create(["name"=> "Agregar Prestamo",])->syncRoles([$role1]);
        Permission::create(["name"=> "Agregar Ejemplar",])->syncRoles([$role1]);

        Permission::create(["name"=> "Eliminar libro",])->syncRoles([$role1]);
        Permission::create(["name"=> "Eliminar Usuario",])->syncRoles([$role1]);
        Permission::create(["name"=> "Eliminar Prestamo",])->syncRoles([$role1]);
        Permission::create(["name"=> "Eliminar Ejemplar",])->syncRoles([$role1]);

        Permission::create(["name"=> "Editar libro",])->syncRoles([$role1]);
        Permission::create(["name"=> "Editar Usuario",])->syncRoles([$role1]);
        Permission::create(["name"=> "Editar Prestamo",])->syncRoles([$role1]);
        Permission::create(["name"=> "Editar Ejemplar",])->syncRoles([$role1]);

        Permission::create(["name"=> "Mostrar Libros",])->syncRoles([$role1, $role2]);
        Permission::create(["name"=> "Mostrar Usuarios",])->syncRoles([$role1]);
        Permission::create(["name"=> "Mostrar Ejemplares",])->syncRoles([$role1]);
        Permission::create(["name"=> "Mostrar Prestamos",])->syncRoles([$role1]);

    }
    
}
