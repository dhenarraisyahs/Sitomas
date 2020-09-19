<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kode_trx', 'discount','total_trx','customer_id','balance_id','percent_discount','subotal_trx'
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'kode_trx');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id','id');
    }

    public function balance()
    {
        return $this->belongsTo(Customer::class, 'balance_id','id');
    }
}
