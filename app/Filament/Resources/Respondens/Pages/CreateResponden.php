<?php

namespace App\Filament\Resources\Respondens\Pages;

use App\Filament\Resources\Respondens\RespondenResource;
use Filament\Resources\Pages\CreateRecord;

class CreateResponden extends CreateRecord
{
    protected static string $resource = RespondenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Responden Created';
    }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'The responden has been created.';
    }
}
