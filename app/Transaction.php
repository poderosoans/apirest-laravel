<?php

namespace App;

use App\Buyer;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'quantity',
    	'buyer_id',
    	'product_id'
    ];
    // Muchas transacciones tiene un comprador
    public function buyer() {
    	return $this->belongsTo(Buyer::class);
	}
	// Muchas transacciones tiene un producto
    public function product() {
    	return $this->belongsTo(Product::class);
    }
}
