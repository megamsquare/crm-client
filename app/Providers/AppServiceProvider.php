<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Services;
use App\Services\BaseService;
use App\Services\RoleResourceService;
use App\Services\MenuService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('BaseService', function ($app) {
            return new BaseService();
        });
        $this->app->bind('RoleResourceService', function ($app) {
            return new RoleResourceService();
        });
        $this->app->bind('MenuService', function ($app) {
            return new MenuService();
        });
    }
}
