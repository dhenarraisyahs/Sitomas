<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';
    protected $fillable = ['kode','date','customer_id','total_nominal','note'];
    
    public function itemPenjualan()
    {
        return $this->hasMany('App\ItemPenjualan');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}
