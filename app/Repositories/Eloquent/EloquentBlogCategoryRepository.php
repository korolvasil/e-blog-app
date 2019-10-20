<?php

namespace App\Repositories\Eloquent;

use App\Models\BlogCategory;
use App\Repositories\Contracts\BlogCategoryRepository;
use App\Repositories\RepositoryAbstract;

class EloquentBlogCategoryRepository extends RepositoryAbstract implements BlogCategoryRepository
{
    public function entity()
    {
        return BlogCategory::class;
    }
}
