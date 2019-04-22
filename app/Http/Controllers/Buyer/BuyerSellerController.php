<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerSellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        // Obtiene todos los vendedores de un comprador
        $sellers = $buyer->transactions()->with('product.seller')
        ->get()
        ->pluck('product.seller')
        ->unique('id')
        ->values();  // Reorganiza para evitar espacios en blanco que dejan los unique

        return $this->showAll($sellers);
    }
  
}
