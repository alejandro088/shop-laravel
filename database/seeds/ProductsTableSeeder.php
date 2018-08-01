<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;
//use DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('products')->truncate();
        //DB::table('categories')->truncate();
        //DB::table('product_images')->truncate();
        
        // model factories
        factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();

        /* Crea cinco categorias. Cada categoria debe contener 20 productos.
        ** $categories = factory(Category::class,5)->create(); 
        ** $categories->each(function ($category) { 
        **  $products = factory(Product::class,20)->make();
        **  $category->products()->saveMany($products);
        **
        ** });
        */
    }
}
