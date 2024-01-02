<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    public function index()
    {
        return view('posts', [
            'posts' => Post::latest()->filter()->get(),
            'categories' => Category::latest()->filter()->get(),

        ]);
    }

    public function show(Post $posts)
    {
        return view('post', ['posts' => $posts]);
    }
    public function create()
    {
        return view('createPost', ['posts' => Post::all()], ['cats' => Category::all()]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
            'body' => 'required',

            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['created_at'] = now();

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->storePublicly('thumbnails', 'public');
        Post::create($attributes);
        return redirect('/')->with('success', 'post added successfully!');
    }

    public function Rating(Request $request, Post $posts)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);
        if (Auth::check()) {

            $posts->rating = $request->input('rating');
            $posts->save();

            return redirect()->back()->with('success', 'rating added successfully!');
        }
        return redirect()->back()->with('error', 'User not authenticated.');
    }
}
