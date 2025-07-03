<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Announcement extends Model
{
    protected $fillable = [
        'title',
        'content',
        'category',
        'is_published',
        'published_at',
        'created_by',
        'slug'
    ];
    protected static function booted()
    {
        static::creating(function($notice){
            $notice->slug = Str::slug($notice->title, '-');
        });
        static::updating(function($notice){
            if ($notice->isDirty('title')) {
                $notice->slug = Str::slug($notice->title, '-');
            }
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
