<?php

namespace App\Filament\Resources\ContentTypes\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContentTypesTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable(),
            TextColumn::make('slug'),
            TextColumn::make('project.name')->label('Project'),
        ]);
    }
}
