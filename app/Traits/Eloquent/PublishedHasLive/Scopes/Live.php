<?php

namespace App\Traits\Eloquent\PublishedHasLive\Scopes;

use Illuminate\Database\Eloquent\Builder;
use App\Traits\Eloquent\PublishedHasLive\Concerns\LiveQueriesRelationships;

trait Live
{
    use LiveQueriesRelationships;

    public function scopeLive(Builder $builder)
    {
        return $builder->published();
    }

    public function scopeNotLive(Builder $builder)
    {
        return $builder->notPublished;
    }
}
