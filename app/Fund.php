<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $table = 'balances';
    public function cashflow()
    {
        return $this->hasMany('App\Cashflow');
    }

    private function kredit($id,$nominal)
    {
        
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'balance_id');
    }
}
