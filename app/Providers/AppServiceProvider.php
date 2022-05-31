<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        $menus          = [];
        if (Schema::hasTable('menus'))
        {
            $menus = Menu::all();
        }

        return view()->share([
            'menus'=>$menus
        ]);
    }
}
