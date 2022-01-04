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
        $name = 'ARELLANO SALAZAR, CESAR';
        $user = User::factory()->create(['name'=>$name,'email'=>$email, 'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_status' => 1, //Asesor de Practicas
            'docente_telefono'=> rand(999999990,999999999),
            'user_id' => $user->id
        ]);
        $user->assignRole('Docente');

        $email = 'boy@hotmail.com';
        $name = 'BOY CHAVIL, LUIS ENRRIQUE';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => $name ,
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 1,
            'user_id' => $user->id
        ]);
        $user->assignRole('Docente');

        $email = 'cordova@hotmail.com';
        $name = 'CORDOVA OTERO, JUAN LUIS';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_status' => 1,
            'docente_telefono'=> rand(999999990,999999999),
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'gomez@hotmail.com';
        $name = 'GOMEZ AVILA, JOSE ALBERTO';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_status' => 1,
            'docente_telefono'=> rand(999999990,999999999),
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'mendoza@hotmail.com';
        $name = 'MENDOZA DE LOS SANTOS, ALBERTO CARLOS';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,//Asesor de Tesis
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'mendoza1@hotmail.com';
        $name = 'MENDOZA RIVERA, RICARDO DARIO';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'obando@hotmail.com';
        $name = 'OBANDO ROLDAN, JUAN CARLOS';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'sanchez@hotmail.com';
        $name='SANCHEZ TICONA, ROBERT JERRY';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
            Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'santos@hotmail.com';
        $name = 'SANTOS FERNANDEZ, JUAN PEDRO';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 1,
            'user_id' => $user->id        
        ]);
        $user->assignRole('Docente');

        $email = 'tenorio@hotmail.com';
        $name ='TENORIO CABRERA, JULIO LUIS';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
            Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id
        ]);
        $user->assignRole('Docente');
        $email = 'torres@hotmail.com';
        $name='TORRES VILLANUEVA, MARCELINO';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id
        ]);
        $user->assignRole('Docente');

        $email = 'vidal@hotmail.com';
        $name='VIDAL MELGAREJO, ZORAIDA YANET';
        $user = User::factory()->create(['name'=>$name,'email'=>$email,'password' => bcrypt('12345678')]);
        Docente::create([
            'docente_nombre' => $name,
            'docente_email' => $email,
            'docente_telefono'=> rand(999999990,999999999),
            'docente_status' => 2,
            'user_id' => $user->id
        ]);
        $user->assignRole('Docente');
        
    }
}
