<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EnvatoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
         require app_path() . '/Helpers/Header/Menu.php';
    }
}
