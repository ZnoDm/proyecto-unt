<?php

namespace Database\Seeders;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Database\Seeder;
class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $email = 'arellano@hotmail.com';
        $user = User::factory()->create(['email'=>$email, 'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => 'ARELLANO SALAZAR, CÉSAR',
            'docente_email' => $email,
            'docente_status' => 1,
            'docente_telefono'=> rand(999999990,999999999),
            'user_id' => $user->id
        ]);
        $user->assignRole('Docente');
        $email = 'boy@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => 'BOY CHAVIL, LUIS ENRRIQUE',
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 1,
            'user_id' => $user->id
        ]);
        $user->assignRole('Docente');

        $email = 'cordova@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => 'CÓRDOVA OTERO, JUAN LUIS',
            'docente_email' => $email,
            'docente_status' => 1,
            'docente_telefono'=> rand(999999990,999999999),
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'gomez@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => 'GÓMEZ AVILA, JOSÉ ALBERTO',
            'docente_email' => $email,
            'docente_status' => 1,
            'docente_telefono'=> rand(999999990,999999999),
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'mendoza@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => 'MENDOZA DE LOS SANTOS, ALBERTO CARLOS',
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'mendoza1@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => 'MENDOZA RIVERA, RICARDO DARÍO',
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'obando@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => 'OBANDO ROLDÁN, JUAN CARLOSR',
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'sanchez@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
            Docente::create([
            'docente_nombre' => 'SÁNCHEZ TICONA, ROBERT JERRY',
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'santos@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => 'SANTOS FERNÁNDEZ, JUAN PEDRO',
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 1,
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'tenorio@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
            Docente::create([
            'docente_nombre' => 'TENORIO CABRERA, JULIO LUIS',
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id
        ]);

        $email = 'torres@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => 'TORRES VILLANUEVA, MARCELINO',
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id
        ]);
        $user->assignRole('Docente');

        $email = 'vidal@hotmail.com';
        $user = User::factory()->create(['email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => 'VIDAL MELGAREJO, ZORAIDA YANET',
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id
        ]);
        $user->assignRole('Docente');
        
    }
}
