<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{
    protected $fillable = ['article_id', 'type', 'content', 'position'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // Accessors for specific types of content
    public function getDecodedContentAttribute()
    {
        return json_decode($this->content, true);
    }
}
