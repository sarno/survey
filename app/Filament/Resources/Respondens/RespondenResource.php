<?php

namespace App\Filament\Resources\Respondens;

use App\Filament\Resources\Respondens\Pages\CreateResponden;
use App\Filament\Resources\Respondens\Pages\EditResponden;
use App\Filament\Resources\Respondens\Pages\ListRespondens;
use App\Filament\Resources\Respondens\Schemas\RespondenForm;
use App\Filament\Resources\Respondens\Tables\RespondensTable;
use App\Models\Responden;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RespondenResource extends Resource
{
    protected static ?string $model = Responden::class;

      protected static string | UnitEnum | null $navigationGroup = 'Survey';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Responden';

    protected static ?string $navigationLabel = 'Responden';

    protected static ?string $pluralLabel = 'Responden';

    public static function form(Schema $schema): Schema
    {
        return RespondenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RespondensTable::configure($table);
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
            'index' => ListRespondens::route('/'),
            'create' => CreateResponden::route('/create'),
            'edit' => EditResponden::route('/{record}/edit'),
        ];
    }
}
