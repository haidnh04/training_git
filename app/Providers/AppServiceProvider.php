<?php

namespace App\Providers;

use App\View\Components\Alert;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Input\Button;
use Illuminate\Pagination\Paginator;

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
        //
        // Blade::directive('datetime', function ($expression) {
        //     $expression = trim($expression, '\'');
        //     $expression = trim($expression, '"');
        //     $dateobjects = date_create($expression);

        //     if (!empty($dateobjects)) {
        //         $dateformat = $dateobjects->format('d/m/Y H:i:s');
        //         return $dateformat;
        //     }
        //     return false;
        // });

        Blade::if('env', function ($value) {
            //trả về giá trị Boolean
            if (config('app.env') == $value) {
                return true;
            }
            return false;
        });

        Blade::component('package-name', Alert::class);
        Blade::component('button', Button::class);

        //Sử dụng padginh cho bootstrap
        Paginator::useBootstrap();
    }
}
