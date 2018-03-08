<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function items()
    {
        return $this->hasMany(VentaItem::class);
    }
}
