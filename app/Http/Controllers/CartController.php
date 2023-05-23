<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Cart;

class CartController extends Controller
{
    //
    public function ajouter(){
        Cart::add(array(
            'id' => 456,
            'name' => 'Sample Item',
            'price' => 67.99,
            'quantity' => 4,
            'attributes' => array()
        ));
        return redirect(route('cart_index'));
    }
    public function index(){
        $cont=Cart::getContent();
        dd($cont);
    }
}
