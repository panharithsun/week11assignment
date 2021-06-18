<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Categories;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('post', [
            'posts' => $posts
        ]);
    }

    public function create() {
        $categories = Categories::all();

        return view('post-create', [
            'categories' => $categories
        ]);
    }

    public function edit(Request $request, $id) {
        $post = Post::find($id);

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->category_id = $request->get('category_id');
        $post->save();

        return redirect(route('posts'));
    }

    public function editPage($id) {
        $post = Post::find($id);
        $categories = Categories::all();

        return view('post-edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function store(Request $request) {
        $newPost = $request->all();

        $newPost['user_id'] = Auth::id();
        $newPost['category_id'] = $request->get('category_id');
        $newPost['title'] = $request->get('title');
        $newPost['content'] = $request->get('content');

        Post::create($newPost);

        return redirect(route('posts'));
    }

    public function delete($id) {
        $post = Post::find($id);

        $post->delete();

        return redirect(route('posts'));
    }
}
