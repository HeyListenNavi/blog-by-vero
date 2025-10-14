<?php

namespace App\Filament\Resources\PhotographyPosts;

use App\Filament\Resources\PhotographyPosts\Pages\CreatePhotographyPost;
use App\Filament\Resources\PhotographyPosts\Pages\EditPhotographyPost;
use App\Filament\Resources\PhotographyPosts\Pages\ListPhotographyPosts;
use App\Filament\Resources\PhotographyPosts\Pages\ViewPhotographyPost;
use App\Filament\Resources\PhotographyPosts\Schemas\PhotographyPostForm;
use App\Filament\Resources\PhotographyPosts\Schemas\PhotographyPostInfolist;
use App\Filament\Resources\PhotographyPosts\Tables\PhotographyPostsTable;
use App\Models\PhotographyPost;
use BackedEnum;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PhotographyPostResource extends Resource
{
    protected static ?string $model = PhotographyPost::class;

    protected static ?string $modelLabel = 'Camera Roll';

    protected static ?string $pluralModelLabel = 'Camera Rolls';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-camera';

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Schema $schema): Schema
    {
        return PhotographyPostForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PhotographyPostInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PhotographyPostsTable::configure($table);
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
            'index' => ListPhotographyPosts::route('/'),
            'create' => CreatePhotographyPost::route('/create'),
            'view' => ViewPhotographyPost::route('/{record}'),
            'edit' => EditPhotographyPost::route('/{record}/edit'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ViewPhotographyPost::class,
            EditPhotographyPost::class,
        ]);
    }
}
