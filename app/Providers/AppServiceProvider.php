<?php

namespace App\Providers;

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
        
    view()->composer('*', function ($view)
        {

            $categorys = \App\Models\Category::where('category_status','show')->get();
            $tags      = \App\Models\Tag::get();
            $random_blogs= \App\Models\Blog::where('status','show')->with('admin')->inRandomOrder()->limit(5)->get();
            $socials = \App\Models\SocialMedia::where('status','show')->get();

            $view->with(compact('categorys','tags','random_blogs','socials'));
        
        });
    }
}
