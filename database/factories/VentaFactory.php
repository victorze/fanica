<?php

use Faker\Generator as Faker;

$factory->define(App\Venta::class, function (Faker $faker) {
    return [
        'fecha_emision' => new DateTime(),
        'fecha_vcto' => new DateTime(),
        'tipo' => '01',
        'serie' => 'F001',
        'correlativo' => $faker->numberBetween(1, 1000),
        'moneda' => 'PEN',
        'tasa_igv' => 0.18
    ];
});
