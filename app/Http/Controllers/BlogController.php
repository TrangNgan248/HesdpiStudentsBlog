<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function show(Blog $blog)
    {
        $comments = Comment::where('blog_id', $blog->id)->latest()->get();
        return view('page.single', compact('blog', 'comments'));
    }

    public function create()
    {
        return view('page.write');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'max:1000',
            'content' => 'required'
        ]);

        $newBlog = Blog::create([
            'title' => $request->title,
            'display' => $request->image,
            'description' => $request->description,
            'content' => $request->content,
            'author_id' => auth()->user()->id
        ]);

        return redirect()->route('singlePost', [$newBlog->id])
            ->with('message', 'You post has been added!');
    }

    public function edit(Blog $blog)
    {
        return view('page.editPost', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'max:1000',
            'content' => 'required'
        ]);

        Blog::find($blog->id)->update([
            'title' => $request->title,
            'display' => $request->image,
            'description' => $request->description,
            'content' => $request->content,
            'author_id' => auth()->user()->id
        ]);

        return redirect()->route('singlePost', [$blog->id])
            ->with('message', 'Your post has been updated!');
    }

    public function delete(Blog $blog)
    {
        $blog->likeComments()->delete();
        $blog->likes()->delete();
        $blog->comments()->delete();
        $blog->delete();
        return redirect('/home')
            ->with('message', 'Your post has been deleted!');
        dd(session()->has('message'));
    }
}
