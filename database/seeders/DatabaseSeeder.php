<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\RolModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
   
    public function run(): void {
        // \App\Models\User::factory(10)->create();
        /*
         \App\Models\RolModel::factory()->create([
            'clave' => 'admin',
            'name' => 'Rol adminmistrador',
            'description'=> 'Tiene acceso a todas las funcionaes'
         ]);
         */
        $rol = new RolModel();
        $rol->clave = 'admin';
        $rol->name = 'Rol adminmistrador';
        $rol->description='Tiene acceso a todas las funciones';
        $rol->save();

        $rol1 = new RolModel();
        $rol1->clave = 'invitado';
        $rol1->name = 'Rol invitado';
        $rol1->description='Solo tiene acceso a las publicaciones';
        $rol1->save();

        $rol2 = new RolModel();
        $rol2->clave = 'publicista';
        $rol2->name = 'Rol publicista';
        $rol2->description='Restricción en edición y eliminación de categorias no propias';
        $rol2->save();
        
    }
}
