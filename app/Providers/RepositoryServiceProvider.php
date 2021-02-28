<?php

namespace App\Providers;

use App\Models\MetalConvertablePrice;
use App\Repositories\Calculation\CalculationRepository;
use App\Repositories\Calculation\CalculationRepositoryInterface;
use App\Repositories\Converter\ConverterRepository;
use App\Repositories\Converter\ConverterRepositoryInterface;
use App\Repositories\MetalPrice\MetalPriceRepository;
use App\Repositories\MetalPrice\MetalPriceRepositoryInterface;
use App\Repositories\Namaz\NamazRepository;
use App\Repositories\Namaz\NamazRepositoryInterface;
use App\Repositories\Zakat\ZakatRepository;
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
            return new ZakatRepository();
        });

        // All converter repository
        $this->app->singleton(ConverterRepositoryInterface::class,function ($app){
            return new ConverterRepository();
        });

        // Calculation
        $this->app->singleton(CalculationRepositoryInterface::class,function ($app){
            return new CalculationRepository(
                resolve(MetalPriceRepositoryInterface::class)
            );
        });

        // Metal Price
        $this->app->singleton(MetalPriceRepositoryInterface::class,function ($app){
            return new MetalPriceRepository( new MetalConvertablePrice());
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
