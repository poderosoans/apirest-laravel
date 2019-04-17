<?php

namespace App;

use App\Transaction;
use App\Scopes\BuyerScope;

class Buyer extends User
{
	protected static function boot() {
		parent::boot();
		
		static::addGlobalScope(new BuyerScope);
	}

	// Un comprador puede tener muchas transacciones. 1...*
    public function transactions() {
    	return $this->hasMany(Transaction::class);
    }
}
