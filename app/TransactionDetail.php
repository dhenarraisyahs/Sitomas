<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kode_trx', 'product_id', 'product_price'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'kode_trx','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
