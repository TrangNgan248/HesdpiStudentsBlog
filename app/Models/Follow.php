<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $table = 'followers';

    protected $fillable = [
        'parent_id',
        'follower_id'
    ];

    public function beFollowed()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    
}
