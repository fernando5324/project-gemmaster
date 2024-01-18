<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::where('is_deleted',0)->get();
        return view('index', compact('products'));
    }

    public function create(Request $request)
    {
        $product = null;
        if ($request->has('product_id')) {
            $product = Product::find($request->input('product_id'));
        }

        $categories = Category::where('is_deleted', 0)->get();


        return view('Product.create', compact( 'product','categories'));
    }


}
