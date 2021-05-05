<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('product.index')->with(compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        //$product = Product::find($id);
        // dd($product);
        return view('product.show')->with(compact('product'));
        //return view('product.show', compact('product'));

        
    }
}
