<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Pengiriman;

class PengirimanChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Pengiriman per Bulan';

    protected function getData(): array
    {
        $data = Pengiriman::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        $labels = [];
        $totals = [];

        foreach ($data as $bulan => $total) {
            $labels[] = date('F', mktime(0, 0, 0, $bulan, 1));
            $totals[] = $total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pengiriman',
                    'data' => $totals,
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#1E88E5',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }

    public static function getSort(): int
    {
        return 1;
    }
}
