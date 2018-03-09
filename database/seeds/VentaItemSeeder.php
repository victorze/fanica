<?php

use Illuminate\Database\Seeder;

class VentaItemSeeder extends Seeder
{
    public function run()
    {
        factory(App\VentaItem::class)->create([
            'venta_id' => App\Venta::find(1)->id,
            'producto_id' => App\Producto::find(1)->id,
        ]);
        factory(App\VentaItem::class)->create([
            'venta_id' => App\Venta::find(1)->id,
            'producto_id' => App\Producto::find(2)->id,
        ]);
    }
}
