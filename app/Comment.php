<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function comment(Post $post, $comment)
    {
        $comment = new Comment([
            'comment' => $comment,
            'post_id' => $post->id,
        ]);
        $this->comments()->save($comment);
    }

}
