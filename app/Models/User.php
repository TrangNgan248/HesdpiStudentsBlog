<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'image',
        'role'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'author_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'liker_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function likeComments()
    {
        return $this->hasMany(LikeComment::class, 'user_id');
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'parent_id');
    }
   
    public function followedBy(User $user)
    {
        return $this->followers->contains('follower_id', $user->id);
    }

    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role');
    }

    public function userComment()
    {
        return $this->belongsToMany(Blog::class, 'comments');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'user_id');
    }

    public function bookmarkBlogs()
    {
        return $this->hasManyThrough(Bookmark::class, Blog::class, 'author_id', 'blog_id');
    }

}
