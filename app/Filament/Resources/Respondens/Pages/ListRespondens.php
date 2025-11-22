<?php

namespace App\Filament\Resources\Respondens\Pages;

use App\Filament\Resources\Respondens\RespondenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRespondens extends ListRecords
{
    protected static string $resource = RespondenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
