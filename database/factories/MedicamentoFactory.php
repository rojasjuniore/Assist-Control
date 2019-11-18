<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Medicamento;
use Faker\Generator as Faker;

$factory->define(Medicamento::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->text,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
