<?php
namespace Ejetar\DecimalLocale\Providers;

use Ejetar\DecimalLocale\Http\Middleware\DecimalLocale;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    public function boot() {
        app('router')->aliasMiddleware('decimal_locale', DecimalLocale::class);

//        $this->publishes([
//            __DIR__ . '/../../config/decimal-locale.php' => config_path('decimal-locale.php'),
//        ]);
    }

    public function register() {
//        $this->mergeConfigFrom(__DIR__ . '/../../config/decimal-locale.php', 'decimal-locale');
    }
}
