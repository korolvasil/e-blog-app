<?php

namespace App\Traits\Eloquent\PublishedHasLive;

use Illuminate\Database\Eloquent\Builder;

trait PublishedHasLivePost
{
    use PublishedHasLiveTrait;

    protected $publishColumn = 'is_published';

    public function isLive()
    {
        return $this->isPublished() && (!$this->category || $this->category->isLive());
    }

    public function isNotLive()
    {
        return !$this->isLive();
    }

    public function scopeLive(Builder $builder)
    {
        return $builder->published()->whereDoesntHaveNotLive('category');
    }
}
