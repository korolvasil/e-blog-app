<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Exceptions\NoEntityDefined;
use App\Repositories\Contracts\RepositoryInterface;

abstract class RepositoryAbstract implements RepositoryInterface
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

    public function all()
    {
        return $this->entity->all();
    }

    /**
     * @return Model
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
}
