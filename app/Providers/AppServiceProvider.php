<?php /** @noinspection ALL */

namespace App\Providers;

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
        //Migration Default String Length:: MySQL older than the 5.7.7
        Schema::defaultStringLength(191);

        /**
         * Instead of adding the service provider in the config/app.php file,
         * we allowed our application to load the Laravel IDE Helper on non-production env.
         */
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
