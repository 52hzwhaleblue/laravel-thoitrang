<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
//Thêm 2 dòng
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\ProfileComposer;
class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Registering composer with Class
        View::composer('*', ProfileComposer::class);
    }
}
