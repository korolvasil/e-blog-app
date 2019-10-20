<?php

namespace App\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Boolean;

trait HasLive
{
    public function scopeLive(Builder $builder)
    {
        return $builder->where('is_published', true);
    }

    public function isLive()
    {
        return  !!$this->is_published;
    }

    public function isNotLive()
    {
        return !$this->isLive();
    }
}
