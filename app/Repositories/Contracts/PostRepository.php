<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *  @method Collection all();
 *  @method Model|Builder find($id);
 *  @method Collection findWhere($column, $value);
 *  @method Model|Builder findWhereFirst($column, $value);
 *  @method LengthAwarePaginator paginate($perPage = 10);
 *  @method Model|Builder create(array $properties);
 *  @method Model|Builder update($id, array $properties);
 *  @method mixed delete($id);
 */
interface PostRepository
{
}
