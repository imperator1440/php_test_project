<?php

namespace App\Http\Controllers;

use App\Models\Post; 
use App\Http\Requests\CommentForm;
use Illuminate\Http\Request;

class IndexController extends Controller
{   

    public function search(Request $request)
    {
        $search = $request->search;
        $lastPost = Post::orderBy("created_at", "DESC")->limit(1)->get();
        $posts = Post::where('title', 'LIKE', "%{$search}%")
                            ->orWhere('description', 'LIKE', "%{$search}%")
                            ->orWhere('preview', 'LIKE', "%{$search}%")
                            ->orWhere('category', 'LIKE', "%{$search}%")
                            ->orderBy("created_at", "DESC")->paginate(4); 
        return view('home', [
            "posts" => $posts, 
            "lastPost" =>$lastPost
        ]); 
    }

    public function category(Request $request)
    {
        $category = $request->search;
        $lastPost = Post::orderBy("created_at", "DESC")->limit(1)->get();
        $posts = Post::where('title', 'LIKE', "{$category}")
                            ->orderBy("created_at", "DESC")->paginate(4); 
        return view('home', [
            "posts" => $posts, 
            "lastPost" =>$lastPost
        ]); 
        
    }

    public function index()
    {   
        $posts = Post::orderBy("created_at", "DESC")->paginate(4); 
        $lastPost = Post::orderBy("created_at", "DESC")->limit(1)->get();
        return view('home', [
            "posts" => $posts, 
            "lastPost" =>$lastPost
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
 
        return view('show', [
            "post" => $post,
        ]);
    }

    public function comment($id, CommentForm $request)
    {
        $post = Post::findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect(route("show", $id));
    }
}
