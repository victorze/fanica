<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaItem extends Model
{
    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
