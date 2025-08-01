<?php

namespace App\Filament\Resources\Icons;

use App\Filament\Resources\Icons\Pages\CreateIcon;
use App\Filament\Resources\Icons\Pages\EditIcon;
use App\Filament\Resources\Icons\Pages\ListIcons;
use App\Filament\Resources\Icons\Pages\ViewIcon;
use App\Filament\Resources\Icons\Schemas\IconForm;
use App\Filament\Resources\Icons\Schemas\IconInfolist;
use App\Filament\Resources\Icons\Tables\IconsTable;
use App\Models\Icon;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IconResource extends Resource
{
    protected static ?string $model = Icon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return IconForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return IconInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IconsTable::configure($table);
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
            'index' => ListIcons::route('/'),
            'create' => CreateIcon::route('/create'),
            'view' => ViewIcon::route('/{record}'),
            'edit' => EditIcon::route('/{record}/edit'),
        ];
    }
}
