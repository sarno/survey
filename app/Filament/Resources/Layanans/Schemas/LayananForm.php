<?php

namespace App\Filament\Resources\Layanans\Schemas;

use App\Models\Instansi;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class LayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('instansi_id')
                    ->label('Instansi')
                    ->options(Instansi::all()->pluck('name.id', 'id'))
                    ->required()
                    ->searchable(),
                Tabs::make('Localization')
                    ->tabs([
                        Tabs\Tab::make('Indonesia')
                            ->schema([
                                TextInput::make('name.id')
                                    ->label('Nama Layanan')
                                    ->required(),
                                Textarea::make('description.id')
                                    ->label('Deskripsi Layanan')
                                    ->nullable(),
                            ]),
                        Tabs\Tab::make('Arabic')
                            ->schema([
                                TextInput::make('name.ar')
                                    ->label('Nama Layanan (Arabic)')
                                    ->required(),
                                Textarea::make('description.ar')
                                    ->label('Deskripsi Layanan (Arabic)')
                                    ->nullable(),
                            ]),
                    ]),
            ]);
    }
}
