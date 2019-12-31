<?php

namespace App\Repositories\Eloquent\Criteria;

class EagerLoadPublished extends EagerLoad
{

    public function __construct($relations)
    {
        $relations = is_string($relations) ? func_get_args() : $relations;

        $relationsPublishedQueries = [];

        foreach ($relations as $rel) {
            $relationsPublishedQueries[$rel] = function ($q) {
                $q->published();
            };
        }

        parent::__construct($relationsPublishedQueries);
    }
}
