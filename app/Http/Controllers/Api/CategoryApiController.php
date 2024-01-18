<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryApiController extends Controller
{

    public function save(Request $request)
    {
        #$request->validate(Category::$rules);

        $category_id = $request->input('id');

        if ($category_id != 0) {
            $category = Category::find($category_id);
        } else {
            $category = new Category;
        }

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect()->route('create.category')
            ->with('message', 'Category created successfully.');
    }

    public function save_update(Request $request, $id)
    {

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->price = $request->input('price');
        $category->stock = $request->input('stock');
        $category->save();

        return redirect()->route('create.category')
            ->with('message', 'Category update successfully.');
    }


    public function delete($id)
    {

        $category = Category::find($id);
        $category->is_deleted = 1;
        $category->save();

        return redirect()->route('create.category')
            ->with('message', 'Category delete successfully.');
    }
}
