<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
	        $UserMenu = app('App\Http\Controllers\MenuController')->getUserMenu();
	        $view->with('usermenu', $UserMenu);
        });
        
        //view()->composer('*', function($view){
	    //   $Favourites = app('App\Http\Controllers\FavouriteController')->getFavouritesWidget();
	   //    $view->with('favouriteswidget', $Favourites); 
       // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}