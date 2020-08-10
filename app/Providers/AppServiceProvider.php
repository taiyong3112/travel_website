<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Destination;
use App\Models\Blog;

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
        Schema::defaultStringLength(191);
        view()->composer('*',function($view){
            $view->with([
                'destination' => Destination::where('status', 1)->orderBy('name','ASC')->get(),
                'blog' => Blog::limit(3)->where('status', 1)->orderBy('id','DESC')->get()
            ]);
        });
    }
}
