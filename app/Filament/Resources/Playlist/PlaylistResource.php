<?php

namespace App\Filament\Resources\Playlist;

use App\Filament\Resources\Playlist\Pages\CreatePlaylist;
use App\Filament\Resources\Playlist\Pages\EditPlaylist;
use App\Filament\Resources\Playlist\Pages\ListPlaylists;
use App\Filament\Resources\Playlist\Pages\ViewPlaylist;
use App\Filament\Resources\Playlist\Schemas\PlaylistForm;
use App\Filament\Resources\Playlist\Schemas\PlaylistInfolist;
use App\Filament\Resources\Playlist\Tables\PlaylistTable;
use App\Models\Playlist;
use BackedEnum;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PlaylistResource extends Resource
{
    protected static ?string $model = Playlist::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQueueList;

    protected static ?string $recordTitleAttribute = 'Playlist';

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Schema $schema): Schema
    {
        return PlaylistForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PlaylistInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlaylistTable::configure($table);
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
            'index' => ListPlaylists::route('/'),
            'create' => CreatePlaylist::route('/create'),
            'view' => ViewPlaylist::route('/{record}'),
            'edit' => EditPlaylist::route('/{record}/edit'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ViewPlaylist::class,
            EditPlaylist::class,
        ]);
    }
}
