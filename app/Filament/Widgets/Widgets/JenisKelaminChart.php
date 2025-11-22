<?php

namespace App\Filament\Widgets\Widgets;

use App\Models\Layanan;
use App\Models\Responden;
use Filament\Forms\Components\Select;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class JenisKelaminChart extends ChartWidget
{
    // NON-STATIC (sesuai parent di Filament 4)
    protected ?string $heading = 'Distribusi Jenis Kelamin';

    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $data = Responden::query()
            ->when($activeFilter, function ($query, $layananId) {
                return $query->whereHas('jawaban.pertanyaan', function ($query) use ($layananId) {
                    $query->where('layanan_id', $layananId);
                });
            })
            ->select('gender', DB::raw('count(*) as count'))
            ->groupBy('gender')
            ->pluck('count', 'gender')
            ->toArray();

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => 'Jumlah Responden',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                    ],
                    'hoverBackgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }


}
