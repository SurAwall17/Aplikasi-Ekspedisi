<?php

namespace App\Providers;

use Filament\Facades\Filament;
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
            if (!auth()->check()) return;

            if (request()->is('admin/login')) {
                return;
            }

            if (auth()->user()->role !== 'admin') {
                // Tambahkan pesan alert
                session()->flash('error', 'Akses ditolak! Hanya admin yang dapat masuk.');

                auth()->logout();
                session()->invalidate();
                session()->regenerateToken();

                redirect()->route('login')->send();
            }
        });
    }
}
