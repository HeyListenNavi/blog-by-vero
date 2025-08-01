<?php

namespace App\Filament\Resources\PostImages;

use App\Filament\Resources\PostImages\Pages\CreatePostImage;
use App\Filament\Resources\PostImages\Pages\EditPostImage;
use App\Filament\Resources\PostImages\Pages\ListPostImages;
use App\Filament\Resources\PostImages\Pages\ViewPostImage;
use App\Filament\Resources\PostImages\Schemas\PostImageForm;
use App\Filament\Resources\PostImages\Schemas\PostImageInfolist;
use App\Filament\Resources\PostImages\Tables\PostImagesTable;
use App\Models\PostImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostImageResource extends Resource
{
    protected static ?string $model = PostImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PostImageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PostImageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostImagesTable::configure($table);
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
            'index' => ListPostImages::route('/'),
            'create' => CreatePostImage::route('/create'),
            'view' => ViewPostImage::route('/{record}'),
            'edit' => EditPostImage::route('/{record}/edit'),
        ];
    }
}
