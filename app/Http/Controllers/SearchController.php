<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
        
        $products = Product::where('name','like',"%$query%")->get();
        if ($products->count() == 1){
            $id = $products->first()->id;
            
            return redirect("products/{$id}");            
        }

        return view('search')->with(compact('products','query'));

    }

    public function data()
    {
        $products = Product::pluck('name');

        return $products;
    }
}