<?php

namespace App\Traits\Eloquent\PublishedHasLive;

use Illuminate\Database\Eloquent\Builder;

trait PublishedHasLiveCategory
{
    use PublishedHasLiveTrait;

    protected $publishColumn = 'is_published';

    public function isLive()
    {
        return !$this->isNotLive();
    }

    public function isNotLive()
    {
        return $this->isNotPublished() || $this->ancestors->contains(function ($category, $key) {
                return $category->isNotPublished();
            });
    }

    public function scopeLive(Builder $builder)
    {
        return $builder->published()->whereDoesntHaveNotPublished('ancestors');
    }

    public function scopeNotLive(Builder $builder)
    {
        return $builder->notPublished()->orWhereHasNotPublished('ancestors');
    }

    public function scopeDisplayable(Builder $builder)
    {
        return $builder->live()
            ->where(function ($q) {
                return $q->whereHasPublished('posts')
                    ->orWhereHasLive('descendants', function ($q) {
                        return $q->whereHasPublished('posts');
                    });
            });
    }
}
