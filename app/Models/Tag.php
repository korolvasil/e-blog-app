<?php

namespace App\Models;

//use App\Traits\Eloquent\HasPublished;
use App\Traits\Eloquent\DeletePublishedHasLive\HasLive;
use App\Traits\Eloquent\PublishedLive\PublishedHasLive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
