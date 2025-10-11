<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'topic',
        'topic_id',
        'published_at',
    ];

    protected static function booted()
    {
        static::creating(function ($article) {
            $slug = Str::slug($article->title);

            $originalSlug = $slug;
            $counter = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $article->slug = $slug;
        });
    }

    public function topicModel()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }


    public function contentBlocks()
    {
        return $this->hasMany(ContentBlock::class)->orderBy('position');
    }
}
