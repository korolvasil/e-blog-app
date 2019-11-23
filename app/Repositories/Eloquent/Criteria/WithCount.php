<?php

namespace App\Repositories\Eloquent\Criteria;

class WithCount extends EagerLoad
{
    public function apply($entity)
    {
        return $entity->withCount($this->relations);
    }
}
