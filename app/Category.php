<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name',
    	'description'
    ];

    // Muchas categoría pertenece a muchos productos
    public function products() {
    	return $this->belongsToMany(Product::class);
    }
}
