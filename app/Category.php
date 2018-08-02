<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //validation
    public static $messages = [
        'name.required' => 'Debe ingresar un nombre para la categoria.',
        'name.min' => 'El nombre de la categoria debe tener al menos 3 caracteres',
        'description.max' => 'La descripcion corta solo admite un maximo de 250 caracteres'           
    ];
    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'max:250'
    ];

    protected $fillable = ['name', 'description'];
    // $category->products;
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getShortDescAttribute()
    {
        return str_limit($this->description,25);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredProduct = $this->products()->first();
        return $featuredProduct->featured_image_url;
    }
}
