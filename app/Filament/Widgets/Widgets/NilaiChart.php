<?php

namespace App\Filament\Widgets\Widgets;

use App\Models\Layanan;
use App\Models\Responden;
use Filament\Forms\Components\Select;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class NilaiChart extends ChartWidget
{
    // NON-STATIC (harus sama dengan parent)
    protected ?string $heading = 'Distribusi Total Nilai';

    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $scoreRanges = [
            '0-10', '11-20', '21-30', '31-40', '41-50',
            '51-60', '61-70', '71-80', '81-90', '91-100'
        ];

        $query = Responden::query()
            ->when($activeFilter, function ($query, $layananId) {
                return $query->whereHas('jawaban.pertanyaan', function ($query) use ($layananId) {
                    $query->where('layanan_id', $layananId);
                });
            });

        $data = $query->select(
                DB::raw('CASE
                    WHEN total_nilai BETWEEN 0 AND 10 THEN "0-10"
                    WHEN total_nilai BETWEEN 11 AND 20 THEN "11-20"
                    WHEN total_nilai BETWEEN 21 AND 30 THEN "21-30"
                    WHEN total_nilai BETWEEN 31 AND 40 THEN "31-40"
                    WHEN total_nilai BETWEEN 41 AND 50 THEN "41-50"
                    WHEN total_nilai BETWEEN 51 AND 60 THEN "51-60"
                    WHEN total_nilai BETWEEN 61 AND 70 THEN "61-70"
                    WHEN total_nilai BETWEEN 71 AND 80 THEN "71-80"
                    WHEN total_nilai BETWEEN 81 AND 90 THEN "81-90"
                    WHEN total_nilai BETWEEN 91 AND 100 THEN "91-100"
                    ELSE "Lain-lain"
                END as score_range'),
                DB::raw('count(*) as count')
            )
            ->groupBy('score_range')
            ->pluck('count', 'score_range')
            ->toArray();

        $counts = array_map(fn($range) => $data[$range] ?? 0, $scoreRanges);

        return [
            'labels' => $scoreRanges,
            'datasets' => [
                [
                    'label' => 'Jumlah Responden',
                    'data' => $counts,
                    'backgroundColor' => '#FFC107',
                    'borderColor' => '#FFC107',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
