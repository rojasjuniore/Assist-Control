<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Estudios;
use Faker\Generator as Faker;

$factory->define(Estudios::class, function (Faker $faker) {

    return [
        'id_usuario' => $faker->word,
        'tipo' => $faker->word,
        'h_nombre' => $faker->word,
        'h_apellido' => $faker->word,
        'h_identifica' => $faker->word,
        'h_iniciales' => $faker->word,
        'h_dia' => $faker->randomDigitNotNull,
        'h_mes' => $faker->randomDigitNotNull,
        'h_anio' => $faker->randomDigitNotNull,
        'h_pais' => $faker->word,
        'a_especie' => $faker->word,
        'a_duenio' => $faker->word,
        'a_animal' => $faker->word,
        'a_iniciales' => $faker->word,
        'a_dia' => $faker->randomDigitNotNull,
        'a_mes' => $faker->randomDigitNotNull,
        'a_anio' => $faker->randomDigitNotNull,
        'ip' => $faker->word,
        'user_agent' => $faker->word,
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
