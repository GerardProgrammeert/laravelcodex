<?php

namespace App\Providers;

use App\Helpers\ClassToBind;
use App\Helpers\Singleton;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClassToBind::class, function() {
            return new ClassToBind('Gerard');
        });
        $this->app->singleton('currentUser', fn () => User::find(1));
        $this->app->singleton(Singleton::class, function() {
            $singleton = new Singleton(1);
            return $singleton->user;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(Singleton::class, function() {
            return new Singleton(1);
        });
    }
}
