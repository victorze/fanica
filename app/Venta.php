<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function items()
    {
        return $this->hasMany(VentaItem::class);
    }

    public function baseImponible()
    {
        $suma = 0;
        foreach ($this->items as $item) {
            $suma += round($item->cantidad * $item->valor_unitario, 2);
        }
        return $suma;
    }

    public function igv()
    {
        return round($this->baseImponible() * $this->tasa_igv, 2);
    }

    public function importeTotal()
    {
        return $this->baseImponible() + $this->igv();
    }
}
