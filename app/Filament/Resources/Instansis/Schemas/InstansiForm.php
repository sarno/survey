<?php

namespace App\Filament\Resources\Instansis\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class InstansiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Tabs::make('Localization')
                    ->tabs([ 
                        Tabs\Tab::make('Indonesia')
                            ->schema([
                             TextInput::make('name.id')
                                ->label('Nama')
                                ->required(),
                            Textarea::make('description.id')
                                ->label('Alamat')
                                ->nullable(),
                        ])
                    ]),
                    Tabs::make('Arabic')
                    ->tabs([ 
                        Tabs\Tab::make('Arabic')
                            ->schema([
                             TextInput::make('name.ar')
                                ->label('Nama')
                                ->required(),
                            Textarea::make('description.ar')
                                ->label('Alamat')
                                ->nullable(),
                        ])
                    ]),
                ]); 
    }
}
