<?php

namespace App\Filament\Resources\Fields\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FieldForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('content_type_id')
                ->relationship('contentType', 'name')
                ->required(),

            TextInput::make('name')
                ->required()
                ->helperText('Example: title, body, price'),

            Select::make('type')
                ->options([
                    'text' => 'Text',
                    'number' => 'Number',
                    'boolean' => 'Boolean',
                    'image' => 'Image',
                    'richtext' => 'Rich Text',
                ])
                ->required(),

            Toggle::make('required'),
        ]);
    }
}
