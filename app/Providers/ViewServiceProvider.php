<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;  
use App\Setting ; 

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('Front.includes.header' , function($view)
        {
            $view->with('categories' , Category::select('id' , 'name')
            ->get());
            $view->with('setting' , Setting::select('logo')->first()); 
        });

        view()->composer('Front.includes.footer' , function($view)
        {
            $view->with('setting' , Setting::first()); 
        });


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
