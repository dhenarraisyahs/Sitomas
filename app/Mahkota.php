<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahkota extends Model
{
    protected $fillable = ['name','type','sertificate'];

    public function products()
    {
        return $this->belongsTo('App\Product');
    }
}
