<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();  
        Storage::deleteDirectory('practicas');
        Storage::makeDirectory('practicas'); //Como hemos definido public en file system lo creara ahí
        Storage::deleteDirectory('tesis');
        Storage::makeDirectory('tesis'); //Como hemos definido public en file system lo creara ahí
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);      
        $this->call(DocenteSeeder::class);
        $this->call(AdministrativoSeeder::class);
        $this->call(AlumnoSeeder::class);
    }
}
