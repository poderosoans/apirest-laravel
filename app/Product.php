<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	const PRODUCT_DISPONIBLE = 'Disponible';
	const PRODUCT_NO_DISPONIBLE = 'No disponible';
    // Atributos asignables de manera masiva
    protected $fillable = [
    	'name',
    	'description',
    	'quantity',
    	'status',
    	'image',
    	'seller_id'
    ];

    public function isAvailable() {
    	return $this->status == Product::PRODUCT_DISPONIBLE;
    }
}
