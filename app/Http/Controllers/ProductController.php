<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products   = Product::where('active', true)->with('category')->get();
        $categories = Category::where('active', true)->get();

        return view('catalogo', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('producto', compact('product'));
    }
}