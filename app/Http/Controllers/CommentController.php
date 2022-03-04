<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Like;
use App\Models\LikeComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function comment(Request $request, Blog $blog)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'comment_content' => $request->comment,
            'blog_id' => $blog->id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('singlePost', [$blog->id]);
    }

    public function delete(Comment $comment)
    {
        $comment->likes()->delete();
        $comment->delete();

        return redirect()->route('singlePost', [$comment->blog->id]);
    }

    public function like(Comment $comment)
    {
        $comment->likes()->create([
            'comment_id' => $comment->id,
            'user_id' => auth()->user()->id,
        ]);
        return back();
    }

    public function destroyLike(Comment $comment, Request $request)
    {
        $request->user()->likeComments()->where('comment_id', $comment->id)->delete();
        return back();
    }
}
