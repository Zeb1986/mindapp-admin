<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('Upload-s3')
                    ->url(config('app.url') . '/' . 'upload-s3' , shouldOpenInNewTab: true)
                    ->icon('heroicon-s-arrow-circle-up')
                    ->activeIcon('heroicon-s-arrow-circle-up')
                    ->group('Helpers')
                    ->sort(1),
            ]);
        });
    }
}
