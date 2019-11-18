<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cremedios;
use Faker\Generator as Faker;

$factory->define(Cremedios::class, function (Faker $faker) {

    return [
        'idMatMed' => $faker->randomDigitNotNull,
        'id_cremedios' => $faker->randomDigitNotNull,
        'col_c' => $faker->randomDigitNotNull,
        'col_d' => $faker->randomDigitNotNull,
        'col_e' => $faker->randomDigitNotNull,
        'pregnancia' => $faker->randomDigitNotNull,
        'nombre' => $faker->word,
        'tipoClasico' => $faker->randomDigitNotNull,
        'tipoPolicresto' => $faker->randomDigitNotNull,
        'tipoAvanzado' => $faker->randomDigitNotNull,
        'tipoRemedioClave' => $faker->randomDigitNotNull,
        'puros' => $faker->randomDigitNotNull,
        'secuencia' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
