<?php

namespace App\Traits\Eloquent\PublishedHasLive\Concerns;

use Closure;
use Illuminate\Database\Eloquent\Builder;

trait HasScopeFactory
{
    /*
     * Add a relationship count / exists condition to the query, wrapped by additional custom scope.
     */
    protected function hasScope(string $scope, Builder $builder, $relation, $operator = '>=', $count = 1, $boolean = 'and', $callback = null)
    {
        return $builder->has($relation, $operator, $count, $boolean, $this->getScopedCallback($scope, $callback));
    }

    /*
     * Getting scoped callback or wrapping existing callable with scoped callback.
     */
    protected function getScopedCallback(string $scope, $callback = null)
    {
        // We'll wrap Closure with our constraint function if it is not null.
        // Otherwise we'll just return our scope constraint Closure

        return function ($builder) use ($callback, $scope) {
            return $callback instanceof Closure ? $callback($builder)->{$scope}()
                : $builder->{$scope}();
        };
    }

    protected function orHasScope(string $scope, Builder $builder, $relation, $operator = '>=', $count = 1)
    {
        return $this->hasScope($scope, $builder, $relation, $operator, $count, 'or', null );
    }

    protected function doesntHaveScope(string $scope, Builder $builder, $relation, $boolean = 'and', $callback = null)
    {
        return $this->hasScope($scope, $builder, $relation, '<', 1, $boolean, $callback);
    }

    protected function orDoesntHaveScope(string $scope, Builder $builder, $relation)
    {
        return $this->doesntHaveScope($scope, $builder, $relation, 'or', null);
    }

    protected function whereHasScope(string $scope, Builder $builder, $relation, $callback = null, $operator = '>=', $count = 1)
    {
        return $this->hasScope($scope, $builder, $relation, $operator, $count, 'and', $callback);
    }

    protected function orWhereHasScope(string $scope, Builder $builder, $relation, $callback = null, $operator = '>=', $count = 1)
    {
        return $this->hasScope($scope, $builder, $relation, $operator, $count, 'or', $callback);
    }

    protected function whereDoesntHaveScope(string $scope, Builder $builder, $relation, $callback = null)
    {
        return $this->doesntHaveScope($scope, $builder, $relation, 'and', $callback);
    }

    protected function orWhereDoesntHaveScope(string $scope, Builder $builder, $relation, $callback = null)
    {
        return $this->doesntHaveScope($scope, $builder, $relation, 'or', $callback);
    }

    protected function withScope(string $scope, Builder $builder, $relations)
    {
        // allow using cortege and array as params of constraints;
        $relations = is_array($relations[0]) ? $relations[0] : $relations;
        return $builder->with($this->setScopedCallbackOnEachRelationsQueries($relations, $scope));
    }

    protected function withCountOfScope(string $scope, Builder $builder, $relations)
    {
        // allow using cortege and array as params of constraints;
        $relations = is_array($relations[0]) ? $relations[0] : $relations;
        return $builder->withCount($this->setScopedCallbackOnEachRelationsQueries($relations, $scope));
    }

    protected function factoryScope(Builder $builder, array $arguments, string $methodName, string $scope)
    {
        $scopeMethod = $this->getQueryMethodNameFromMethodScope($methodName, $scope);

        if(in_array($scopeMethod, ['withScope', 'withCountOfScope'])){
            return $this->{$scopeMethod}($scope, $builder, $arguments);
        }

        return $this->{$scopeMethod}($scope, $builder, ...$arguments);
    }

    protected function getQueryMethodNameFromMethodScope(string $methodName, string $scope)
    {
        $start = 5; // length of 'scope' prefix
        $end = strpos($methodName, ucfirst($scope));

        return lcfirst(substr($methodName, $start, $end - $start)). 'Scope';
    }

    /*
     * Parse a list of relations and set|wrap with our constraints on each of them.
     */
    protected function setScopedCallbackOnEachRelationsQueries(array $relations,  $scope)
    {
        /*try {*/

            $relationsQueries = [];
            foreach ($relations as $key => $val){
                if($val instanceof Closure){
                    // If the "val" value is a callable, we can assume that constraints have been specified.
                    // So We'll wrap Closure with our constraint callable.
                    $relationsQueries[$key] = $this->getScopedCallback($scope, $val);
                } else {
                    // If the "val" value is a numeric key, we can assume that no
                    // constraints have been specified. We'll just put our
                    // Closure there, so that we can treat them all the same.
                    $relationsQueries[$val] = $this->getScopedCallback($scope, null);
                }
            }
            return $relationsQueries;

        /*} catch (\Exception $e) {
            dd($relations,  $scope);
        }*/



    }
}
