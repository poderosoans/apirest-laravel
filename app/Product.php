<?php

namespace App;

use App\Seller;
use App\Category;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

	const PRODUCT_DISPONIBLE = 'Disponible';
	const PRODUCT_NO_DISPONIBLE = 'No disponible';

    protected $dates = ['deleted_at'];

    // Atributos asignables de manera masiva
    protected $fillable = [
    	'name',
    	'description',
    	'quantity',
    	'status',
    	'image',
    	'seller_id'
    ];

    protected $hidden = [
        'pivot'
    ];

    public function isAvailable() {
    	return $this->status == Product::PRODUCT_DISPONIBLE;
    }

    // Muchos productos pertenece a muchas categorias
    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    // Un producto pertenece a un vendedor | Productos pertenece a un vendedor, porque es quien lleva la llave foranea
    public function seller() {
        return $this->belongsTo(Seller::class);
    }
    // Un producto posee muchas transacciones, puesto que transacción es quien lleva la llave foranea.
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
