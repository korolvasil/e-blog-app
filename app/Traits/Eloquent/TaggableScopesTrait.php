<?php

namespace App\Traits\Eloquent;


trait TaggableScopesTrait
{
    public function scopeWithAnyTag($query, array $tags)
    {
        return $query->whereHas('tags', function ($query) use ($tags) {
            return $query->whereIn('slug', $tags);
        });
    }

    public function scopeWithAllTag($query, array $tags)
    {
        foreach ($tags as $tag) {
            $query->whereHas('tags', function ($query) use ($tag) {
                return $query->where('slug', $tag);
            });
        }

        return $query;
    }
}
