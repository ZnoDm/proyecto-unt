<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'id' => 30,
            'name' => 'Nelson Alejandro',
            'email' => 'nelson@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole('Alumno');

        Alumno::create([
            'id' => 1023300119,
            'user_id' =>$user->id,
            'alumno_nombre' => $user->name,
            'alumno_apellido' => 'Angeles Piedra',
            'alumno_email' => $user->email,
            'alumno_fechanacimiento'=>'1999-09-09',
            'alumno_telefono' => '923983014'
        ]);
        
        $users = User::factory(5)->create();

        foreach($users as $user ){
            Alumno::factory(1)->create(['user_id' =>$user->id,'alumno_nombre' => $user->name,'alumno_email' => $user->email]);
            $user->assignRole('Alumno');
        }
        
    }
}
