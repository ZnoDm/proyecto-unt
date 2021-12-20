<?php

namespace Database\Seeders;

use App\Models\Administrativo;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdministrativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_secretaria = User::create([
            'id' => 21,
            'name' => 'Secretaria',
            'email' => 'secretaria@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $user_secretaria->assignRole('Secretaria');
        Administrativo::create([
            'admin_nombre'=>'Secretaria',        
            'admin_status'=>1,
            'user_id'=> $user_secretaria->id
        ]);

        $user_director = User::create([
            'id' => 20,
            'name' => 'Director',
            'email' => 'direccion@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $user_director->assignRole('Director');
        Administrativo::create([
            'admin_nombre'=>'Director',        
            'admin_status'=>1,
            'user_id'=> $user_director->id
        ]);
    }
}
