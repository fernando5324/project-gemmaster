<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create(Request $request)
    {

        $categories = Category::where('is_deleted', 0)->get();

        $category = null;
        if ($request->has('category_id')) {
            
            $category = Category::find($request->input('category_id'));
        }

        return view('Category.create', compact('category', 'categories'));
    }
}
