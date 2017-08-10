<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {
        auth()->user()->comnent($post, $request->get('comment'));

        return redirect($post->url);
    }

    public function accept(Comment $comment)
    {
        $comment->markAnAnswer();

        return redirect($comment->post->url);
    }

}
