<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{

    public function show(User $user)
    {
        $bookmarkBlog = $user->bookmarkBlogs()->pluck('blog_id');
        $blogs = Blog::whereIn('id', $bookmarkBlog)->orderBy('created_at', 'DESC')->get();
        return view('page.bookmark', compact('user', 'blogs'));
    }
    public function store(Blog $blog)
    {
        $blog->bookmarks()->create([
            'blog_id' => $blog->id,
            'user_id' => auth()->user()->id,
        ]);
        return back();
    }

    public function destroy(Blog $blog, Request $request)
    {
        $request->user()->bookmarks()->where('blog_id', $blog->id)->delete();
        return back();
    }
}
