<?php

namespace App\Filament\Resources\ContentTypes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContentTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('project_id')
                ->relationship('project', 'name')
                ->required(),

            TextInput::make('name')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->required()
                ->maxLength(255),
        ]);
    }
}
