<?php

namespace App\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;

trait HasLive
{
    public static $liveColumn = 'is_published';

    public function scopeLive(Builder $builder)
    {
        return $builder->where(self::$liveColumn, true);
    }

    public function scopeNotLive(Builder $builder)
    {
        return $builder->where(self::$liveColumn, false);
    }

    public function isLive()
    {
        return  !!$this->{self::$liveColumn};
    }

    public function isNotLive()
    {
        return !$this->isLive();
    }
}
