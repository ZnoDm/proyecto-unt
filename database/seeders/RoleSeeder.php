<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name'=>'Alumno']);
        $role->permissions()->attach([1,2,3]);

        $role = Role::create(['name'=>'Secretaria']);
        $role->permissions()->attach([4,5,6]);

        $role = Role::create(['name'=>'Director']);
        $role->permissions()->attach([4,7]);
        
        $role = Role::create(['name'=>'Docente']);
        $role->permissions()->attach([4,8]);
    }
}
