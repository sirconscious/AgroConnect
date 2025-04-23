<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    { 
        $products = collect([
            (object)[
                'id' => 1,
                'name' => 'Product 1',
                'price' => 10.99,
                'description' => 'Description for Product 1',
            ],
            (object)[
                'id' => 2,
                'name' => 'Product 2',
                'price' => 20.99,
                'description' => 'Description for Product 2',
            ],
            (object)[
                'id' => 3,
                'name' => 'Product 3',
                'price' => 30.99,
                'description' => 'Description for Product 3',
            ],
            (object)[
                'id' => 3,
                'name' => 'Product 3',
                'price' => 30.99,
                'description' => 'Description for Product 3',
            ],
            (object)[
                'id' => 3,
                'name' => 'Product 3',
                'price' => 30.99,
                'description' => 'Description for Product 3',
            ],
            (object)[
                'id' => 3,
                'name' => 'Product 3',
                'price' => 30.99,
                'description' => 'Description for Product 3',
            ],
            (object)[
                'id' => 3,
                'name' => 'Product 3',
                'price' => 30.99,
                'description' => 'Description for Product 3',
            ],
            (object)[
                'id' => 3,
                'name' => 'Product 3',
                'price' => 30.99,
                'description' => 'Description for Product 3',
            ],
        ]);
            
        return view('Products.ListeAllProducts' , compact('products'));
    }
}
