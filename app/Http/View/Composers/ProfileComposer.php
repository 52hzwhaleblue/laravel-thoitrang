<?php
namespace App\Http\View\Composers;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class ProfileComposer
{
    public function compose(View $view)
    {
        $com = Route::currentRouteName();
        $url = url()->full();

        $ProfileComposer = [
            'com' => $com,
            'url' => $url,

        ];
        $view->with('ProfileComposer', $ProfileComposer);
    }
}
?>
