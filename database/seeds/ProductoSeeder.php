<?php

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        factory(App\Producto::class, 10)->create();
    }
}
