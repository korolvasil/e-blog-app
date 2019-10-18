<?php

namespace App\Repositories\Eloquent;

use App\Models\BlogPost;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\RepositoryAbstract;

class EloquentPostRepository extends RepositoryAbstract implements PostRepository
{
    public function entity()
    {
        return BlogPost::class;
    }
}
