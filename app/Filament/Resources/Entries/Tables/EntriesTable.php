<?php

namespace App\Filament\Resources\Entries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
class EntriesTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('contentType.name')->label('Type'),
            TextColumn::make('status'),
            TextColumn::make('created_at')->dateTime(),
        ]);
    }
}
