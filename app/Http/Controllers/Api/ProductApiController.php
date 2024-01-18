<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductApiController extends Controller
{

    public function save(Request $request)
    {
        $request->validate(Product::$rules);

        $product_id = $request->input('id');

        if ($product_id != 0) {
            $product = Product::find($product_id);
        } else {
            $product = new Product;
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->is_deleted = 0;
        $product->stock = $request->input('stock');
        $product->id_category = $request->input('id_category');
        $product->save();

        return redirect()->route('index.product')
            ->with('message', 'Product created successfully.');
    }

    public function save_update(Request $request, $id)
    {

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();

        return redirect()->route('index.product')
            ->with('message', 'Product update successfully.');
    }


    public function delete($id)
    {

        $product = Product::find($id);
        $product->is_deleted = 1;
        $product->save();

        return redirect()->route('index.product')
            ->with('message', 'Product delete successfully.');
    }
}
