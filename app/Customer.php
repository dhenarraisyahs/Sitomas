<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['name','nohp','alamat'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'customer_id');
    }
}
