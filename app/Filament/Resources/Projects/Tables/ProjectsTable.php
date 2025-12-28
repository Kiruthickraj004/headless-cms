<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('slug'),

            TextColumn::make('api_key')
                ->label('API Key')
                ->copyable()
                ->toggleable(),
        ]);
    }
}
