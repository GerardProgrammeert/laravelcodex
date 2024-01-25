<?php

declare(strict_types=1);

namespace App\Providers;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

/**
 * A service provide must be add to the bootstrap file providers
 */
class CollectionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Collection::macro('firstUpper', function() {
            return $this->map(function (array $item) {
                $item['name'] = Str::ucfirst(Str::lower($item['name']));
                return $item;
            });
        });
    }
}
