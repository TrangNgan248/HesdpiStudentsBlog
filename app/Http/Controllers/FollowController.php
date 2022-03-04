<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function show(User $user)
    {
        $followers = $user->followers()->pluck('follower_id');
        $followersInfo = User::whereIn('id', $followers)->get();
        return view('page.listFollower', compact('user', 'followers', 'followersInfo'));
    }

    public function store(User $user)
    {
        Follow::where('follower_id', $user->id)->create([
            'follower_id' => $user->id,
            'parent_id' => auth()->user()->id,
        ]);

        return back();
    }

    public function destroy(User $user, Request $request)
    {
        $request->user()->followers()->where('follower_id', $user->id)->delete();
        return back();
    }
}
