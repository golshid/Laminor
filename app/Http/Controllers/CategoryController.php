<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showallcategories()
    {
        return view('showallcategories')->with('categories', Category::all());
    }
    
    public function index()
    {
        return view('Category.index')->with('categories', Category::all());
    }

    public function findcategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category')->with('posts', $category->post()->orderBy('created_at', 'desc')->paginate(3))->with('categories', Category::all());
    }

    


    


}
