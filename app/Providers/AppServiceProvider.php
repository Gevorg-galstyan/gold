<?php

namespace App\Providers;


use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $categories = Category::orderBy('order', 'asc')->get();
        View::share(compact('categories'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'laravellocalization.supportedLocales' => [
                'en' => ['name' => 'English', 'script' => 'flags/en.png', 'prefix' => 'en'],
                'ru' => ['name' => 'Русский', 'script' => 'flags/ru.png',  'prefix' => 'ru'],
                'hy' => ['name' => 'Հայերեն',  'script' => 'flags/hy.png',  'prefix' => 'hy'],
            ],

            'laravellocalization.useAcceptLanguageHeader' => true,

            'laravellocalization.hideDefaultLocaleInURL' => true
        ]);
    }
}
