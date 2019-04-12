<?php

namespace App;

use App\Transaction;

class Buyer extends User
{
	// Un comprador puede tener muchas transacciones. 1...*
    public function transactions() {
    	return $this->hasMany(Transaction::class);
    }
}
