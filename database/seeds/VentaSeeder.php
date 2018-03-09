<?php

use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    public function run()
    {
        factory(App\Venta::class)->create([
            'cliente_id' => App\Cliente::find(1)->id,
        ]);
        factory(App\Venta::class)->create([
            'cliente_id' => App\Cliente::find(2)->id,
        ]);
    }
}
