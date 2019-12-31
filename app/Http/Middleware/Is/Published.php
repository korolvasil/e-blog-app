<?php

namespace App\Http\Middleware\Is;

use Closure;

class Published
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
        if ($request->{$model} && $request->{$model}->isNotPublished()) {
            return abort(404);
        }
        return $next($request);
    }
}
