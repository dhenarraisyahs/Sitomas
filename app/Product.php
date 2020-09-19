<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['kode','categories_id','emas_id','mahkota_id','cabinet_id','name','weight','stock','nominal','gambar','status'];

    public function categories()
    {
        return $this->belongsTo('App\Categories');
    }

    public function emas()
    {
        return $this->belongsTo('App\Emas');
    }

    public function mahkota()
    {
        return $this->belongsTo('App\Mahkota');
    }

    public function cabinet()
    {
        return $this->belongsTo('App\Cabinet');
    }
    public function product()
    {
        return $this->hasMany(TransactionDetail::class, 'product_id','id');
    }
}
