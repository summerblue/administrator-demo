<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\PostObserver;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		Post::observe(PostObserver::class);
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

         if (app()->environment() == 'local' || app()->environment() == 'testing') {

            $this->app->register(\Summerblue\Generator\GeneratorsServiceProvider::class);

        }
    }
}
