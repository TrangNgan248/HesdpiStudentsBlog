<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store(Blog $blog)
    {

        $blog->likes()->create([
            'blog_id' => $blog->id,
            'liker_id' => auth()->user()->id,
        ]);

        return back();
    }

    public function destroy(Blog $blog, Request $request)
    {
        $request->user()->likes()->where('blog_id', $blog->id)->delete();
        return back();
    }
}
