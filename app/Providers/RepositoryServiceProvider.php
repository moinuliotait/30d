<?php

namespace App\Providers;

use App\Repositories\Converter\ConverterRepository;
use App\Repositories\Converter\ConverterRepositoryInterface;
use App\Repositories\Namaz\NamazRepository;
use App\Repositories\Namaz\NamazRepositoryInterface;
use App\Repositories\Zakat\ZakatInterface;
use App\Repositories\Zakat\ZakatRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Namaz Repository
        $this->app->singleton(NamazRepositoryInterface::class,function ($app){
            return new NamazRepository();
        });

        // Zakat Repository
        $this->app->singleton(ZakatRepositoryInterface::class,function ($app){
            return new ZakatInterface();
        });

        // All converter repository
        $this->app->singleton(ConverterRepositoryInterface::class,function ($app){
            return new ConverterRepository();
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
