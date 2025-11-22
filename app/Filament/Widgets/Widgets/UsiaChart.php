<?php

namespace App\Filament\Widgets\Widgets;

use App\Models\Layanan;
use App\Models\Responden;
use Filament\Forms\Components\Select;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class UsiaChart extends ChartWidget
{
    // NON STATIC
    protected ?string $heading = 'Distribusi Usia';

    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $ageGroups = ['<17', '18-25', '26-30', '31-40', '>40'];

        $data = Responden::query()
            ->when($activeFilter, function ($query, $layananId) {
                return $query->whereHas('jawaban.pertanyaan', function ($query) use ($layananId) {
                    $query->where('layanan_id', $layananId);
                });
            })
            ->select('usia', DB::raw('count(*) as count'))
            ->groupBy('usia')
            ->pluck('count', 'usia')
            ->toArray();

        $counts = array_map(fn($group) => $data[$group] ?? 0, $ageGroups);

        return [
            'labels' => $ageGroups,
            'datasets' => [
                [
                    'label' => 'Jumlah Responden',
                    'data' => $counts,
                    'backgroundColor' => '#9BD0F5',
                    'borderColor' => '#9BD0F5',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
