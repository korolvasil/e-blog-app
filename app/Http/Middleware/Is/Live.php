<?php

namespace App\Http\Middleware\Is;

use Closure;

class Live
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $model)
    {
        if ($request->{$model} && $request->{$model}->isNotlive()) {
            return abort(404);
        }
        return $next($request);
    }
}
