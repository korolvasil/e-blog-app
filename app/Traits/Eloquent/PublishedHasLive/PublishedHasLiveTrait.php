<?php

namespace App\Traits\Eloquent\PublishedHasLive;

use App\Traits\Eloquent\PublishedHasLive\Scopes\Live;
use App\Traits\Eloquent\PublishedHasLive\Scopes\Published;
use App\Traits\Eloquent\PublishedHasLive\Concerns\HasScopeFactory;

trait PublishedHasLiveTrait
{
    use HasScopeFactory, Published, Live;

    protected $publishColumn = 'is_published';

    public function isPublished()
    {
        return  !!$this->{$this->publishColumn};
    }

    public function isNotPublished()
    {
        return !$this->isPublished();
    }

    public function isLive()
    {
        return $this->isPublished();
    }

    public function isNotLive()
    {
        return $this->isNotPublished();
    }
}
