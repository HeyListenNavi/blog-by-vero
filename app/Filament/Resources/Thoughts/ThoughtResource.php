<?php

namespace App\Filament\Resources\Thoughts;

use App\Filament\Resources\Thoughts\Pages\CreateThought;
use App\Filament\Resources\Thoughts\Pages\EditThought;
use App\Filament\Resources\Thoughts\Pages\ListThoughts;
use App\Filament\Resources\Thoughts\Pages\ViewThought;
use App\Filament\Resources\Thoughts\Schemas\ThoughtForm;
use App\Filament\Resources\Thoughts\Schemas\ThoughtInfolist;
use App\Filament\Resources\Thoughts\Tables\ThoughtsTable;
use App\Models\Thought;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ThoughtResource extends Resource
{
    protected static ?string $model = Thought::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ThoughtForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ThoughtInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ThoughtsTable::configure($table);
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
            'index' => ListThoughts::route('/'),
            'create' => CreateThought::route('/create'),
            'view' => ViewThought::route('/{record}'),
            'edit' => EditThought::route('/{record}/edit'),
        ];
    }
}
