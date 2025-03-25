<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function show(Product $product)
    {
        $randomProduct = Product::where('quantity', '>', 0)->where('status', 1)->get()->random(4);
        return view('products.show', compact('product', 'randomProduct'));
    }



    public function menu()
    {
        $products = Product::paginate(6);
        return view('products.menu', compact('products'));
    }
}
