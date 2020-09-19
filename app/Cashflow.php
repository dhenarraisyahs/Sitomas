<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    public function balance()
    {
        return $this->belongsTo('App/Fund');
    }

}
