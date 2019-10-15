<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\RepositoryAbstract;

class EloquentPostRepository extends RepositoryAbstract implements PostRepository
{
    public function entity()
    {
        return Post::class;
    }

    public function all()
    {
        return Post::all();
    }
}
