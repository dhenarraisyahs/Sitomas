<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPenjualan extends Model
{
    protected $table = 'item_penjualans';

    public function itemPenjualan()
    {
        return $this->hasMany('App\ItemPenjualan');
    }

}
