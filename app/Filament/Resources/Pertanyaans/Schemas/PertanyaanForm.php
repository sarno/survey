<?php

namespace App\Filament\Resources\Pertanyaans\Schemas;

use App\Models\Layanan;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PertanyaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('layanan_id')
                    ->label('Layanan')
                    ->options(Layanan::all()->pluck('name.id', 'id'))
                    ->required()
                    ->searchable(),
                Tabs::make('Localization')
                    ->tabs([
                        Tabs\Tab::make('Indonesia')
                            ->schema([
                                TextInput::make('question.id')
                                    ->label('Pertanyaan (Indonesia)')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Arabic')
                            ->schema([
                                TextInput::make('question.ar')
                                    ->label('Pertanyaan (Arabic)')
                                    ->required(),
                            ]),
                    ]),
            ]);
    }
}
