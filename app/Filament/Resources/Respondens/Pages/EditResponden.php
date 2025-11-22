<?php

namespace App\Filament\Resources\Respondens\Pages;

use App\Filament\Resources\Respondens\RespondenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditResponden extends EditRecord
{
    protected static string $resource = RespondenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Responden Updated';
    }
}
