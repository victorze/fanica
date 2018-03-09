<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        factory(App\Cliente::class, 10)->create();
    }
}
