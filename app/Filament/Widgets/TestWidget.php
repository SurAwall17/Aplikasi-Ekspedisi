<?php

namespace App\Filament\Widgets;

use App\Models\Truk;
use App\Models\User;
use App\Models\Pengiriman;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TestWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('User', User::count())
            ->description('Total Pengguna')
            ->descriptionIcon('heroicon-m-users', IconPosition::Before)
            ->chart([1,3,5,10,20,40])
            ->color('success'),

            Stat::make('Total Pengiriman', Pengiriman::count())
            ->description('Total Pengiriman')
            ->descriptionIcon('heroicon-m-truck', IconPosition::Before)
            ->chart([1,3,5,6,40])
            ->color('info'),

            Stat::make('Total Truk', Truk::count())
            ->description('Total Truk')
            ->descriptionIcon('heroicon-m-truck', IconPosition::Before)
            ->chart([1,3,5,10,20,40])
            ->color('primary')
        ];
    }
}
