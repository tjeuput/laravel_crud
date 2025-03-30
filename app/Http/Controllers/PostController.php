<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();
        return view('blog.index', [
            'posts' => $posts,
            'title' => 'Blog Page',
        ]);
    }

    public function show($id){
        $post = Post::where('id', $id)->firstOrFail();
        return view('blog.show', [
            'post' => $post,
            'title' => $post->title,
        ]);
    }
}
