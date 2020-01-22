<?php

namespace App\Providers;

use App\categorie;
use App\course;
use App\Http\Services\CategorieService;
use App\Http\Services\CategorieServiceImpl;
use App\Http\Services\CourseService;
use App\Http\Services\CourseServiceImpl;
use App\image;
use App\Observers\CategorieObserver;
use App\Observers\CourseObserver;
use App\Observers\ImageObserver;
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
        $this->app->singleton(CategorieService::class, CategorieServiceImpl::class);
        $this->app->singleton(CourseService::class, CourseServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        categorie::observe(CategorieObserver::class);
        course::observe(CourseObserver::class);
        image::observe(ImageObserver::class);

        $this->publishes([
            __DIR__ . '/config/imageable.php' => config_path('imageable.php'),
        ]);
    }
}
