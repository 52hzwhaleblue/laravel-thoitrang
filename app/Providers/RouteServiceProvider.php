<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    // HOME ĐƯỢC DÙNG ĐỂ SAU KHI LOGIN THÀNH CÔNG ->

    public const HOME = '/';
    // public const HOME = '/dashboard';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {

        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/v2.0')
                ->group(base_path('routes/api/auth.php'));
            Route::middleware('api')
                ->prefix('api/v2.0')
                ->group(base_path('routes/api/user.php'));
            Route::middleware('api')
                ->prefix('api/v2.0')
                ->group(base_path('routes/api/banner.php'));
            Route::middleware('api')
                ->prefix('api/v2.0')
                ->group(base_path('routes/api/product.php'));
            Route::middleware('api')
                ->prefix('api/v2.0')
                ->group(base_path('routes/api/noti.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
