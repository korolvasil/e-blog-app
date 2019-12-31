<?php

namespace App\Traits\Eloquent\PublishedHasLive\Scopes;

use Illuminate\Database\Eloquent\Builder;
use App\Traits\Eloquent\PublishedHasLive\Concerns\PublishedQueriesRelationships;

trait Published
{
    use PublishedQueriesRelationships;

    public function scopePublished(Builder $builder)
    {
        return $builder->where($this->publishColumn, true);
    }

    public function scopeNotPublished(Builder $builder)
    {
        return $builder->where($this->publishColumn, false);
    }
}
