<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Search\Search;

class SearchProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Search\Search', function() {
            return new Search();
        });
    }
}
