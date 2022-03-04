<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = [
        'title', 'display', 'description', 'content', 'author_id'
    ];

    public function likedBy(User $user)
    {
        return $this->likes->contains('liker_id', $user->id);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'blog_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id');
    }

    public function likeComments()
    {
        return $this->hasManyThrough(LikeComment::class, Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function userComment(){
        return $this->belongsToMany(User::class, 'comments');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'blog_id');
    }

    public function bookmarkBy(User $user)
    {
        return $this->bookmarks->contains('user_id', $user->id);
    }
}
