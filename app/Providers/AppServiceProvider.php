<?php

namespace App\Providers;

use App\Http\Controllers\Admin\InfoController;
use App\Item;
use App\Moreitem;
use Exception;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
     
        
 
       // Queue::
    
        ini_set('memory_limit', '512M');
    
        if(env('APP_ENV') == 'production')
        \URL::forceScheme('https');


        Schema::defaultStringLength(191);
 
        try{

            view()->share('depts',Item::all());
            view()->share('info', InfoController::getinfo());
            view()->share('reitems',Moreitem::orderBy('updated_at', 'desc')->take(5)->get());
        
        }catch(Exception $e){

        }
}
}