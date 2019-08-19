<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  App\Models\Category;

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
        // khoi chay khi ung dung laravel chay len 
        $data['categories'] = Category::all();
        view()->share($data);
    }
}
