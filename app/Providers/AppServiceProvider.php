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
use App\Models\TableNotification;


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
            $slide = TablePhoto::where('type', 'slideshow')->where('status',1)->get();

            View::share(compact(
                'social',
                'slide',
            ));
        }



        if(Schema::hasTable('table_statics')){
            $footer = TableStatic::where('type', 'footer')->first();
            View::share('footer', $footer);
        }

        if(Schema::hasTable('table_notifications')){
            $count_total_notifications = TableNotification::where('is_read', 0)->get();
            $count_order_notifications = TableNotification::where('is_read', 0)
                ->where('type','order')
                ->get();
            $count_chat_notifications = TableNotification::where('is_read', 0)
                ->where('type','chat')
                ->get();
            $type_notifications = DB::table('table_notifications')
                ->select('type')
                ->groupBy('type')
                ->get();
            $list_notifications = DB::table('table_notifications')->get();

            View::share(compact(
                'count_total_notifications',
                'count_order_notifications',
                'count_chat_notifications',
                'type_notifications',
                'list_notifications',
            ));

//            View::share('count_notifications', $count_notifications);
//            View::share('type_notifications', $type_notifications);
//            View::share('list_notifications', $list_notifications);
        }
    }
}
