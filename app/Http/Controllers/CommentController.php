<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Auth;
use App\Http\Requests\CommentFormRequest;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function getFromPost(Post $post)
    {
        return $post->comments;
    }

    public function getApprovedFromPost(Post $post)
    {
        return $post->comments->where('approved', true);
    }

    public function get(Comment $comment)
    {
        return $comment;
    }

    public function store(CommentFormRequest $request)
    {
        $parent_id = $request->input('parent_id');
        $comment = Comment::create([
            'user_id'   => Auth::user()->id,
            'post_id'   => $request->input('post_id'),
            'parent_id' => $parent_id,
            'subject'   => $request->input('subject'),
            'content'   => $request->input('content'),
            'approved'  => false,
        ]);
        if($comment)
        {
            return redirect()->back();
        }
    }

    public function approve(Comment $comment)
    {
        $comment->update(['approved' => true]);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
    }
}
