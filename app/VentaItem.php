<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaItem extends Model
{
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
