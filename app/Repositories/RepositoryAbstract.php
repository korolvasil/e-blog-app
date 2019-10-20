<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Exceptions\NoEntityDefined;
use App\Repositories\Criteria\CriteriaInterface;
use App\Repositories\Contracts\RepositoryInterface;

abstract class RepositoryAbstract implements RepositoryInterface, CriteriaInterface
{
    protected $entity;

    /**
     * RepositoryAbstract constructor.
     * @throws NoEntityDefined
     */
    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function get()
    {
        return $this->entity->get();
    }

    public function all()
    {
        return $this->entity instanceof Builder
            ? $this->get()
            : $this->entity->all();
    }

    public function find($id)
    {
        return $this->modelOrFail($this->entity->find($id));
    }

    public function findWhere($column, $value)
    {
        return $this->entity->where($column, $value)->get();
    }

    public function findWhereFirst($column, $value)
    {
        return $this->modelOrFail($this->entity->where($column, $value)->first());
    }

    public function paginate($perPage = 10)
    {
        return $this->entity->paginate($perPage);
    }

    public function create(array $properties)
    {
        return $this->entity->create($properties);
    }

    public function update($id, array $properties)
    {
        return $this->find($id)->update($properties);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function withCriteria(...$criteria)
    {
        $criteria = Arr::flatten($criteria);

        foreach ($criteria as $criterion) {
            $this->entity = $criterion->apply($this->entity);
        }

        return $this;
    }

    /**
     * @return Model|Builder
     * @throws NoEntityDefined
     */
    protected function resolveEntity()
    {
        try {
            return app()->make($this->entity());
        } catch (Exception $e) {
            throw new NoEntityDefined();
        }
    }

    protected function modelOrFail($model)
    {
        if (!$model) {
            // Warning: this is an exception from Eloquent ORM.
            // Create your own exception if you use a different ORM.
            throw (new ModelNotFoundException())->setModel(get_class($this->entity->getModel()));
        }
        return $model;
    }
}
