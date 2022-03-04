<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeComment extends Model
{
    use HasFactory;

    protected $table = 'likecomments';

    protected $fillable = [
        'user_id',
        'comment_id'
    ];

    public $timestamps = false;

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
