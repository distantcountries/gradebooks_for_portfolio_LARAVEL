<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Gradebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $commentRequest = request('comment');
        // $this->validate(request(), Comment::STORE_RULES);
        
        $comment = new Comment;
        $comment->content = $commentRequest['content'];
        $comment->gradebook_id = (int)request('gradebook_id');
        $comment->user_id = (int)request('user_id');

        $comment->save();
        
        return $comment;
    }
}
