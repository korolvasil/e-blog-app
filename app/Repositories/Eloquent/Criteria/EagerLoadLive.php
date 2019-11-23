<?php

namespace App\Repositories\Eloquent\Criteria;

class EagerLoadLive extends EagerLoad
{

    public function __construct($relations)
    {
        $relations = is_string($relations) ? func_get_args() : $relations;

        $relationsLiveQueries = [];

        foreach ($relations as $rel) {
            $relationsLiveQueries[$rel] = function ($q) {
                $q->live();
            };
        }

        parent::__construct($relationsLiveQueries);
    }
}
