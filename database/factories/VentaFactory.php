<?php

use Faker\Generator as Faker;

$factory->define(App\Venta::class, function (Faker $faker) {
    $date = $faker->date();
    return [
        'fecha_emision' => $date,
        'fecha_vcto' => $date,
        'tipo' => '01',
        'serie' => 'F001',
        'correlativo' => $faker->numberBetween(1, 1000),
        'moneda' => 'PEN',
        'tasa_igv' => 0.18
    ];
});
