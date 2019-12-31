<?php

namespace App\Traits\Eloquent\PublishedHasLive\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait LiveQueriesRelationships
{
    public function scopeHasLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'live');
    }

    public function scopeHasNotLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notLive');
    }

    public function scopeOrHasLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'live');
    }

    public function scopeOrHasNotLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notLive');
    }

    public function scopeDoesntHaveLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'live');
    }

    public function scopeDoesntHaveNotLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notLive');
    }

    public function scopeOrDoesntHaveLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'live');
    }

    public function scopeOrDoesntHaveNotLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notLive');
    }

    public function scopeWhereHasLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'live');
    }

    public function scopeWhereHasNotLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notLive');
    }

    public function scopeOrWhereHasLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'live');
    }

    public function scopeOrWhereHasNotLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notLive');
    }

    public function scopeWhereDoesntHaveLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'live');
    }

    public function scopeWhereDoesntHaveNotLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notLive');
    }

    public function scopeOrWhereDoesntHaveLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'live');
    }

    public function scopeOrWhereDoesntHaveNotLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notLive');
    }

    public function scopeWithLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'live');
    }

    public function scopeWithNotLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notLive');
    }

    public function scopeWithCountOfLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'live');
    }

    public function scopeWithCountOfNotLive(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notLive');
    }
}
