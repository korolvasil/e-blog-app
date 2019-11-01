<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class EagerLoad implements CriterionInterface
{
    protected $relations;

    public function __construct($relations)
    {
        $this->relations = is_string($relations) ? func_get_args() : $relations;
    }

    public function apply($entity)
    {
        return $entity->with($this->relations);
    }
}
