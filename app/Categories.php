<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name'];
    protected $table = 'product_categories';

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
