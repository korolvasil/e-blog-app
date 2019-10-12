<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepository;

class EloquentPostRepository implements PostRepository
{

    public function all()
    {
        return Post::all();
    }
}
