<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Eloquent\PublishedHasLive\PublishedHasLiveTrait;

class Tag extends Model
{
    use SoftDeletes, PublishedHasLiveTrait;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->morphedByMany(BlogPost::class, 'taggable');
    }
}
