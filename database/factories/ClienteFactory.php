<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'tipo_doc' => '6',
        'numero_doc' => $faker->numberBetween($min = 20000000000, $max = 2090000000),
        'razon_social' => $faker->company,
        'domicilio_fiscal' => $faker->address,
    ];
});
