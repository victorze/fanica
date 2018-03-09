<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        'codigo' => $faker->numberBetween($min = 10000, $max = 99999),
        'descripcion' => $faker->sentence($nbWords = 6),
        'valor_referencial' => $faker->randomFloat(2, 5, 100),
        'unidad_medida' => $faker->randomElement(['AQ', 'AR', 'ATT', 'AW']),
    ];
});
