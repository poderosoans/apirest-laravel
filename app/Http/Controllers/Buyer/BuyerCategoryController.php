<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        // Obtiene todos los vendedores de un comprador
        $categories = $buyer->transactions()->with('product.categories')
        ->get()
        ->pluck('product.categories')
        ->collapse()    // Junta una lista de categorías en una sola lista
        ->unique('id')
        ->values();  // Reorganiza para evitar espacios en blanco que dejan los unique

        return $this->showAll($categories);
    }

   
}