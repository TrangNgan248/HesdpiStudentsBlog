<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Like;
use App\Models\LikeComment;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit(User $user)
    {
        return view('page.setting', compact('user'));
    }

    public function update(User $user, Request $request)
    {      
        $request->validate([
            'name' => 'required',
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        User::find($user->id)->update([
            'name' => $request->name,
            'image' => $request->image,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/home')->with('message', 'Your information has been updated!');
    }

    public function destroy(User $user)
    {
        return redirect('/home')->with('message', 'Your account has been deleted!');
    }

    public function show(User $user)
    {
        $blogs = Blog::where('author_id', $user->id)->latest()->get(); 
        return view('page.profile', compact('blogs', 'user'));
    }
}
