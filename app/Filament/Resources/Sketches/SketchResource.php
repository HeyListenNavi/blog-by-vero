<?php

namespace App\Filament\Resources\Sketches;

use App\Filament\Resources\Sketches\Pages\CreateSketch;
use App\Filament\Resources\Sketches\Pages\EditSketch;
use App\Filament\Resources\Sketches\Pages\ListSketches;
use App\Filament\Resources\Sketches\Pages\ViewSketch;
use App\Filament\Resources\Sketches\Schemas\SketchForm;
use App\Filament\Resources\Sketches\Schemas\SketchInfolist;
use App\Filament\Resources\Sketches\Tables\SketchesTable;
use App\Models\Sketch;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SketchResource extends Resource
{
    protected static ?string $model = Sketch::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-code-bracket';

    public static function form(Schema $schema): Schema
    {
        return SketchForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SketchInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SketchesTable::configure($table);
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
            'index' => ListSketches::route('/'),
            'create' => CreateSketch::route('/create'),
            'view' => ViewSketch::route('/{record}'),
            'edit' => EditSketch::route('/{record}/edit'),
        ];
    }
}
