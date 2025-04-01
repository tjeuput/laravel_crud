<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('user')->paginate(5);
        return view('blog.index', [
            'posts' => $posts,
            'title' => 'Blog Page',
        ]);
    }

    public function show($id){
        $post = Post::with('user')->findOrFail($id);
        return view('blog.show', [
            'post' => $post,
            'title' => $post->title,
        ]);
    }

    public function showByAuthor($authorId)
    {
        $posts = Post::with('user')->where('author_id', $authorId)->get();

        if ($posts->isEmpty()) {
            return redirect()->route('blog.index')->with('error', 'No posts found for this author');
        }

        $authorName = $posts->first()->user->name ?? 'Author';

        return view('blog.index', [
            'posts' => $posts,
            'title' => "Posts by $authorName",
        ]);
    }

    public function search(Request $request){
        $search = $request->input('search');

        if($search ===''){
            return redirect()->route('blog.index');
        }


        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(10);

        $posts->append(['search' => $search]);


        return view('blog.index', [
            'posts' => $posts,
            'title' => 'Search Results: ' . $search,
        ]);


    }
}
