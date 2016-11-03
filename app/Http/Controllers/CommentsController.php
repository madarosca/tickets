<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Requests\CommentFormRequest;

use App\Comment;
use App\Ticket;
use App\User;

class CommentsController extends Controller
{
    public function newComment(CommentFormRequest $request)
    {
    	$user = Auth::user()->id;
        $comment = new Comment(array(
            'post_id' => $request->get('post_id'),
            'content' => $request->get('content'),
            'user_id' => $user
        ));

        $comment->save();

        return redirect()->back()->with('status', 'Your comment has been added!');
    }
}
