<?php

namespace App;

use App\Product;
use App\Scopes\SellerScope;
use App\Transformers\SellerTransformer;

class Seller extends User
{
	public $transformer = SellerTransformer::class;

	protected static function boot() {
		parent::boot();
		// Consulta que podemos ejecutar de manera global en un modelo cada vez que se realicen consultas sobre el mismo
		static::addGlobalScope(new SellerScope);
	}

	// Un vendedor tiene muchos productos
    public function products() {
    	return $this->hasMany(Product::class);
    }
}
