<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

use App\Models\TablePhoto;
use App\Models\TableStatic;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('table_photos')){
            $logo = TablePhoto::where('type', 'logo')->first();
            View::share('logo', $logo);
        }

        if(Schema::hasTable('table_photos')){
            $social = TablePhoto::where('type', 'social')->get();
            View::share('social', $social);
        }

        if(Schema::hasTable('table_statics')){
            $footer = TableStatic::where('type', 'footer')->first();
            View::share('footer', $footer);
        }
    }
}
