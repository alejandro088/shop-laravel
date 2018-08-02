<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $products = $category->products()->paginate(9);
        return view('category')->with(compact('category','products'));
    }
}
