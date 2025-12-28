<?php

namespace App\Filament\Resources\Entries\Schemas;

use App\Models\ContentType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('content_type_id')
                ->relationship('contentType', 'name')
                ->reactive()
                ->required(),
            Select::make('status') ->options([
            'draft' => 'Draft',
            'published' => 'Published',
        ])
        ->default('draft')
        ->required(),

            Section::make('Content')
                ->schema(fn (callable $get) => self::buildDynamicFields($get)),
        ]);
    }

    protected static function buildDynamicFields(callable $get): array
    {
        $contentTypeId = $get('content_type_id');

        if (! $contentTypeId) {
            return [];
        }

        $contentType = ContentType::with('fields')->find($contentTypeId);

        if (! $contentType) {
            return [];
        }

        return $contentType->fields->map(function ($field) {
            return match ($field->type) {
                'text' => TextInput::make("data.{$field->name}")
                    ->label(ucfirst($field->name))
                    ->required($field->required),

                'number' => TextInput::make("data.{$field->name}")
                    ->numeric()
                    ->label(ucfirst($field->name)),

                'boolean' => Toggle::make("data.{$field->name}")
                    ->label(ucfirst($field->name)),

                'richtext' => Textarea::make("data.{$field->name}")
                    ->label(ucfirst($field->name)),

                default => TextInput::make("data.{$field->name}")
                    ->label(ucfirst($field->name)),
            };
        })->toArray();
    }
}
