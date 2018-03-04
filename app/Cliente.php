<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
