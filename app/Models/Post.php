<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Markdown;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $fillable = [
        'sublime_blogs_id',
        'title',
        'slug',
        'content',
        'published_at'
    ];

    protected static function booted()
    {
        static::addGlobalScope('chronological', function (Builder $builder) {
            $builder->orderBy('published_at', 'desc');
        });
    }

    /**
     * Get the excerpt of the post.
     */
    public function getExcerptAttribute()
    {
        return str($this->text)->substr(0, 70);
    }

    public function getStatusAttribute()
    {
        if ($this->published_at <= now()) {
            return 'Published';
        } elseif ($this->published_at > now()) {
            return 'Scheduled';
        } else {
            return 'Draft';
        };
    }

    public function getContentAttribute($content)
    {
        return $content  ?? '';
    }

    public function getTextAttribute()
    {
        if ($this->content) {
            return strip_tags($this->html);
        }
    }

    public function getHtmlAttribute()
    {
        return Markdown::parse($this->content ?? '')->toHtml();
    }
}
