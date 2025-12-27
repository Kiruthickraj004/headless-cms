<?php

namespace App\Filament\Resources\ContentTypes;

use App\Filament\Resources\ContentTypes\Pages\CreateContentType;
use App\Filament\Resources\ContentTypes\Pages\EditContentType;
use App\Filament\Resources\ContentTypes\Pages\ListContentTypes;
use App\Filament\Resources\ContentTypes\Schemas\ContentTypeForm;
use App\Filament\Resources\ContentTypes\Tables\ContentTypesTable;
use App\Models\ContentType;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ContentTypeResource extends Resource
{
    protected static ?string $model = ContentType::class;
    protected static ?string $navigationLabel = 'Content Types';
    protected static string|UnitEnum|null $navigationGroup = 'CMS';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ContentTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContentTypesTable::configure($table);
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
            'index' => ListContentTypes::route('/'),
            'create' => CreateContentType::route('/create'),
            'edit' => EditContentType::route('/{record}/edit'),
        ];
    }
}
