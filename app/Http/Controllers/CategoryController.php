<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required'
        ]);

        Category::create([
            'title' => $request->category,
            'slug' => Str::slug($request->category,'-')
        ]);
        Session::flash('success', 'Category created.');
        return redirect()->route('showallcategories');
    }

    public function edit($id)
    {

        return view('editcategory')->with('category', Category::find($id))->with('categories', Category::all());
    }

    
    public function update(Request $request, $id)
    {
        $channel = Category::find($id);
        $channel->title = $request->category;
        $channel->slug = Str::slug($request->category);
        $channel->save();
        Session::flash('success', 'Category edited successfully.');
        return redirect()->route('showallcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Category::destroy($id);
        Session::flash('success', 'Category Deleted.');
        return redirect()->route('showallcategories');
    }

    public function create(){
        return view('createcategory')->with('categories', Category::all());
    }

    


    


}
