<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function create()
    {
        return view('createpost')->with('categories', Category::all());;
    }

    public function store()
    {
        $r = request();
        $this->validate($r, [
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::create([
            'title' => $r->title,
            'content' => $r->content,
            'category_id' => $r->category_id,
            'user_id' => Auth::id(),
            'state' => 1,
            'slug' => Str::slug($r->title,'-')

        ]);
        Session::flash('success', 'Post successfully created.');
        // return redirect()->route('post', ['slug' => $post->slug]);
        return view('home');

        
    }
}
