<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    protected $guarded = [];


    public function store(Post $posts)
    {

        request()->validate([
            'body' => 'required'
        ]);



        $posts->Comment()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')


        ]);
        return back();
    }
}
