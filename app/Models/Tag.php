<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Eloquent\PublishedLive\PublishedHasLive;

class Tag extends Model
{
    use SoftDeletes, PublishedHasLive;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->morphedByMany(BlogPost::class, 'taggable');
    }
}
