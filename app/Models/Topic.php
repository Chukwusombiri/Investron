<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Topic extends Model
{
    /** @use HasFactory<\Database\Factories\TopicFactory> */
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
    ];
    
    protected static function booted()
    {
        static::creating(function ($topic) {
            $slug = Str::slug($topic->title);

            $originalSlug = $slug;
            $counter = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $topic->slug = $slug;
        });
    }

    public function articleModels(){
        return $this->hasMany(Article::class,'topic_id');
    }
}
