<?php

namespace App\Providers;

use App\Models\Content;
use App\Models\ContentType;
use App\Models\ContentTypeCategory;
use App\Models\HadithContent;
use App\Models\MetalConvertablePrice;
use App\Repositories\Calculation\CalculationRepository;
use App\Repositories\Calculation\CalculationRepositoryInterface;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Content\ContentRepositoryInterface;
use App\Repositories\ContentType\ContentTypeRepository;
use App\Repositories\ContentType\ContentTypeRepositoryInterface;
use App\Repositories\ContentTypeCategory\ContentTypeCategoryRepository;
use App\Repositories\ContentTypeCategory\ContentTypeCategoryRepositoryInterface;
use App\Repositories\Converter\ConverterRepository;
use App\Repositories\Converter\ConverterRepositoryInterface;
use App\Repositories\Hadith\HadithRepository;
use App\Repositories\Hadith\HadithRepositoryInterface;
use App\Repositories\lifeStyle\LifeStyleRepository;
use App\Repositories\lifeStyle\LifeStyleRepositoryInterface;
use App\Repositories\MetalPrice\MetalPriceRepository;
use App\Repositories\MetalPrice\MetalPriceRepositoryInterface;
use App\Repositories\Namaz\NamazRepository;
use App\Repositories\Namaz\NamazRepositoryInterface;
use App\Repositories\Zakat\ZakatRepository;
use App\Repositories\Zakat\ZakatRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Educative\EducativeRepository;
use App\Repositories\Educative\EducativeRepositoryInterface;

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
        $this->app->singleton(NamazRepositoryInterface::class, function ($app) {
            return new NamazRepository();
        });

        // Zakat Repository
        $this->app->singleton(ZakatRepositoryInterface::class, function ($app) {
            return new ZakatRepository();
        });

        // All converter repository
        $this->app->singleton(ConverterRepositoryInterface::class, function ($app) {
            return new ConverterRepository();
        });

        // Calculation
        $this->app->singleton(CalculationRepositoryInterface::class, function ($app) {
            return new CalculationRepository(
                resolve(MetalPriceRepositoryInterface::class)
            );
        });

        // Metal Price
        $this->app->singleton(MetalPriceRepositoryInterface::class, function ($app) {
            return new MetalPriceRepository(new MetalConvertablePrice());
        });

        // Content Type
        $this->app->singleton(ContentTypeRepositoryInterface::class, function ($app) {
            return new ContentTypeRepository(new ContentType());
        });

        // Content Type Category
        $this->app->singleton(ContentTypeCategoryRepositoryInterface::class, function ($app) {
            return new ContentTypeCategoryRepository(
                new ContentTypeCategory(),
                resolve(ContentTypeRepositoryInterface::class)
            );
        });

        // life style
        $this->app->singleton(LifeStyleRepositoryInterface::class, function ($app) {
            return new LifeStyleRepository(
                resolve(ContentTypeCategoryRepositoryInterface::class),
                resolve(ContentRepositoryInterface::class)
            );
        });

        // content
        $this->app->singleton(ContentRepositoryInterface::class, function ($app) {
            return new ContentRepository(new Content(),
                resolve(ContentTypeCategoryRepositoryInterface::class)
            );
        });

        // Hadith
        $this->app->singleton(HadithRepositoryInterface::class, function ($app) {
            return new HadithRepository(new HadithContent(),
            resolve(ContentRepositoryInterface::class)
            );
        });

        // Educative
        $this->app->singleton(EducativeRepositoryInterface::class, function ($app) {
            return new EducativeRepository(
                resolve(ContentTypeCategoryRepositoryInterface::class),
                resolve(ContentRepositoryInterface::class)
            );
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
