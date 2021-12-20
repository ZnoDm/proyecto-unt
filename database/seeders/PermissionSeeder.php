<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Alumno*/        
        Permission::create(['name'=>'Ver Alumno Dashboard Tramite']); //1
        Permission::create(['name'=>'Leer Practica']); //2
        Permission::create(['name'=>'Leer Tesis']);//3
        
        /*Administrador ya sea Secretaria Director o Docente */
        Permission::create(['name'=>'Ver Administrador Dashboard']); //4

        /*Secretaria*/    //5      
        Permission::create(['name'=>'Ver Secretaria Practicas']);     //5   
        Permission::create(['name'=>'Ver Secretaria Tesis']); //6

        /*Director*/         
        Permission::create(['name'=>'Ver Director Solicitudes']); // 7

        /*Docente*/         
        Permission::create(['name'=>'Ver DocenteSolicitudes']);  // 8
    }
}
