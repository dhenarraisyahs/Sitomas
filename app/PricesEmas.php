<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricesEmas extends Model
{
    protected $table = 'prices_emas';
    protected $fillable = ['persen'];
}
