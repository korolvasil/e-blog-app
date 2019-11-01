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

    public function loadLive($relations)
    {
        return $this->load(
            self::relationsLiveQuery(is_string($relations) ? func_get_args() : $relations)
        );
    }

    public static function withLive($relations)
    {
        return static::query()->with(
            self::relationsLiveQuery(is_string($relations) ? func_get_args() : $relations)
        );
    }

    public function isLive()
    {
        return  !!$this->{self::$liveColumn};
    }

    public function isNotLive()
    {
        return !$this->isLive();
    }

    protected static function relationsLiveQuery(array $relations)
    {
        $relationsLiveQueries = [];
        foreach ($relations as $rel) {
            $relationsLiveQueries[$rel] = function ($q) {
                $q->live();
            };
        }
        return $relationsLiveQueries;
    }
}
