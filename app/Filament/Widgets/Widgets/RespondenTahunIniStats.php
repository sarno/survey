<?php

namespace App\Filament\Widgets\Widgets;

use App\Models\Layanan;
use App\Models\Responden;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class RespondenTahunIniStats extends BaseWidget
{
    protected function getStats(): array
    {
        $currentYear = Carbon::now()->year;
        $stats = [];

        $layanans = Layanan::all();

        foreach ($layanans as $layanan) {
            $count = Responden::query()
                ->select('responden.id')
                ->join('jawaban', 'responden.id', '=', 'jawaban.responden_id')
                ->join('pertanyaan', 'jawaban.pertanyaan_id', '=', 'pertanyaan.id')
                ->where('pertanyaan.layanan_id', $layanan->id)
                ->whereYear('responden.tanggal_survey', $currentYear)
                ->distinct('responden.id')
                ->count();

            $stats[] = Stat::make(
                "{$layanan->name['id']} (Tahun Ini)",
                $count
            );
        }

        return $stats;
    }
}
