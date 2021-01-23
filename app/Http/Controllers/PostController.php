<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Comment;
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
        return redirect()->route('showpost', ['slug' => $post->slug]);
        

        
    }

    public function index()
    {
        $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(3);
        return view('home')->with('categories', Category::all())->with('posts', $posts);
    }

    public function admininbox()
    {
        $posts = Post::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(3);
        return view('myposts')->with('categories', Category::all())->with('posts', $posts);
    }

    public function showpost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('eachpost')->with('d', $post)->with('categories', Category::all());
    }

    public function reply($id)
    {
        $d = Post::find($id);
        $comment = Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $id,
            'content' => request()->comment
        ]);

        Session::flash('success', 'Commented on the post.');
        return redirect()->back();
    }

}
