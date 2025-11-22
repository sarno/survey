<?php

namespace App\Filament\Resources\Respondens\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RespondenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama')
                    ->required(),
                Select::make('usia')
                    ->label('Usia')
                    ->options([
                        '<17' => '<17',
                        '18-25' => '18-25',
                        '26-30' => '26-30',
                        '31-40' => '31-40',
                        '>40' => '>40',
                    ])
                    ->required(),
                Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan',
                    ])
                    ->required(),
                TextInput::make('phone')
                    ->label('Telepon')
                    ->tel(),
                Select::make('language')
                    ->label('Bahasa')
                    ->options([
                        'ID' => 'Indonesia',
                        'AR' => 'Arabic',
                    ])
                    ->required(),
                TextInput::make('total_nilai')
                    ->label('Total Nilai')
                    ->numeric(),
                DatePicker::make('tanggal_survey')
                    ->label('Tanggal Survey')
                    ->required()
                    ->default(now()),
            ]);
    }
}
