<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\estudio;
use Faker\Generator as Faker;

$factory->define(estudio::class, function (Faker $faker) {

    return [
        'estudio' => $faker->word,
        'estatus' => $faker->randomDigitNotNull,
        'prueba_uno' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
