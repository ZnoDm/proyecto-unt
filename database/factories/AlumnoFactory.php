<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=> $this->faker->unique()->numberBetween(1000000000,1199999999),
            'alumno_apellido'=> $this->faker->lastName,
            'alumno_nombre'=> $this->faker->firstName,
            'alumno_email' => $this->faker->unique()->safeEmail,
            'alumno_fechanacimiento'=> date_format($this->faker->dateTimeBetween('-2 years','now'),'Y-m-d'),
            'alumno_telefono'=> $this->faker->numberBetween(900000000,999999999),
        ];
    }
}
