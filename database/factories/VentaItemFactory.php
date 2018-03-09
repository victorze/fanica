<?php

use Faker\Generator as Faker;

$factory->define(App\VentaItem::class, function (Faker $faker) {
    return [
        'cantidad' => $faker->randomFloat(3, 20, 50),
        'descuento' => 0,
        'afectacion_igv' => '10',
        'valor_unitario' => $faker->randomFloat(2, 5, 100),
    ];
});
