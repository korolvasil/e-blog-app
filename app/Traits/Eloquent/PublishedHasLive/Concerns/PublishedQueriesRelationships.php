<?php

namespace App\Traits\Eloquent\PublishedHasLive\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait PublishedQueriesRelationships
{
    public function scopeHasPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'published');
    }

    public function scopeHasNotPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notPublished');
    }

    public function scopeOrHasPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'published');
    }

    public function scopeOrHasNotPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notPublished');
    }

    public function scopeDoesntHavePublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'published');
    }

    public function scopeDoesntHaveNotPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notPublished');
    }

    public function scopeOrDoesntHavePublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'published');
    }

    public function scopeOrDoesntHaveNotPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notPublished');
    }

    public function scopeWhereHasPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'published');
    }

    public function scopeWhereHasNotPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notPublished');
    }

    public function scopeOrWhereHasPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'published');
    }

    public function scopeOrWhereHasNotPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notPublished');
    }

    public function scopeWhereDoesntHavePublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'published');
    }

    public function scopeWhereDoesntHaveNotPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notPublished');
    }

    public function scopeOrWhereDoesntHavePublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'published');
    }

    public function scopeOrWhereDoesntHaveNotPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notPublished');
    }

    public function scopeWithPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'published');
    }

    public function scopeWithNotPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notPublished');
    }

    public function scopeWithCountOfPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'published');
    }

    public function scopeWithCountOfNotPublished(Builder $builder,...$arguments)
    {
        return $this->factoryScope($builder, $arguments, __FUNCTION__, 'notPublished');
    }
}
