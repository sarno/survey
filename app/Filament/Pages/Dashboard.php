<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\Widgets\JenisKelaminChart;
use App\Filament\Widgets\Widgets\NilaiChart;
use App\Filament\Widgets\Widgets\RespondenTahunIniStats;
use App\Filament\Widgets\Widgets\UsiaChart;

class Dashboard extends BaseDashboard
{
    // Jangan redeclare $view / $title / $navigationSort di sini
    // — biarkan parent menangani tipe (static / non-static)

    // Gunakan method untuk icon (Filament v4 expects method)
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-home';
    }

    // Widgets: instance method
    public function getWidgets(): array
    {
        return [
            RespondenTahunIniStats::class,
            JenisKelaminChart::class,
            UsiaChart::class,
            NilaiChart::class,
        ];
    }
}
