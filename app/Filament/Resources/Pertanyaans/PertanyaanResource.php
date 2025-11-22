<?php

namespace App\Filament\Resources\Pertanyaans;

use App\Filament\Resources\Pertanyaans\Pages\CreatePertanyaan;
use App\Filament\Resources\Pertanyaans\Pages\EditPertanyaan;
use App\Filament\Resources\Pertanyaans\Pages\ListPertanyaans;
use App\Filament\Resources\Pertanyaans\Schemas\PertanyaanForm;
use App\Filament\Resources\Pertanyaans\Tables\PertanyaansTable;
use App\Models\Pertanyaan;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
use BackedEnum;

class PertanyaanResource extends Resource
{
    protected static ?string $model = Pertanyaan::class;

    protected static string | UnitEnum | null $navigationGroup = 'Pengaturan';

    protected static ?int $navigationSort = 0;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $recordTitleAttribute = 'Quisioner';

    protected static ?string $navigationLabel = 'Pertanyaan';

    protected static ?string $pluralLabel = 'Pertanyaan';

    public static function form(Schema $schema): Schema
    {
        return PertanyaanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PertanyaansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPertanyaans::route('/'),
            'create' => CreatePertanyaan::route('/create'),
            'edit' => EditPertanyaan::route('/{record}/edit'),
        ];
    }
}
