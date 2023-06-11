<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function redirectTo($request)
    {
        $return = route('login');

        if (strpos($request->getPathInfo(), 'api') !== false) {
            if (! $request->expectsJson()) {
                return route('login');
            }
            return;
        }

        if (strpos($request->getPathInfo(), 'admin') !== false) {
            $return = route('admin.login');
        }

        return $request->expectsJson() ? null : $return;
    }
}
