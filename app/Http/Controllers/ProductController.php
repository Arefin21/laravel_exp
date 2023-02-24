<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products (){
        return view('products');
    }
    // add product

    public function addProduct(Request $request){
        $request->validate(
            [
                'name'=>'required|unique:products',
                'price'=>'required',
            ],
            [
                'name.required'=>'Name is required',
                'name.unqiue'=>'Priduct Already Exits',
                'price.required'=>'Price is required',
            ]
            );
    }
}
