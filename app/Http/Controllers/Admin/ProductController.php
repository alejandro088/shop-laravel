<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        //validation
        $messages = [
            'name.required' => 'Debe ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'description.required' => 'La descripcion corta es un campo obligatorio',
            'description.max' => 'La descripcion corta solo admite un maximo de 200 caracteres',
            'price.required' => 'Debe ingresar un precio',
            'price.numeric' => 'Ingrese un precio valido',
            'price.min' => 'No se admiten valores negativos'

        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->long_description = $request->input('long_description');
        $product->save(); //INSERT
        
        return redirect('/admin/products');
        
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit')->with(compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
        //validation
        $messages = [
            'name.required' => 'Debe ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'description.required' => 'La descripcion corta es un campo obligatorio',
            'description.max' => 'La descripcion corta solo admite un maximo de 200 caracteres',
            'price.required' => 'Debe ingresar un precio',
            'price.numeric' => 'Ingrese un precio valido',
            'price.min' => 'No se admiten valores negativos'

        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);


        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->long_description = $request->input('long_description');
        $product->save(); //UPDATE
        
        return redirect('/admin/products');
        
    }

    public function destroy($id)
    {
        //dd($request->all());
        $product = Product::find($id);
        
        $product->delete(); //DELETE
        
        return back();
        
    }
}
