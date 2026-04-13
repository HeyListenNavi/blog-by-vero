<?php

namespace App\Filament\Resources\Media\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MediaTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('poster')
                    ->label('Poster')
                    ->imageHeight(200),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'movie' => 'info',
                        'videogame' => 'success',
                        'show' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->searchable(),

                TextColumn::make('stars')
                    ->label('Rating')
                    ->html()
                    ->formatStateUsing(function (int $state) {
                        $active = str_repeat('<span style="color: #eabbb9;">G</span>', $state);
                        $inactive = str_repeat('<span style="color: #444;">F</span>', 5 - $state);
                        return '<div style="font-family: \'Vero\\\'s Emojis\', sans-serif !important; font-size: 1.5rem; line-height: 1; display: flex; gap: 2px;">' . $active . $inactive . '</div>';
                    })
                    ->sortable(),

                TextColumn::make('is_favorite')
                    ->label('Fav')
                    ->html()
                    ->formatStateUsing(fn (bool $state): string => '
                        <div style="font-family: \'Vero\\\'s Emojis\', sans-serif !important; font-size: 1.5rem; line-height: 1; color: ' . ($state ? '#ef4444' : '#444') . ';">
                            C
                        </div>
                    ')
                    ->sortable(),

                TextColumn::make('review_date')
                    ->label('Reviewed On')
                    ->date()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()->icon('heroicon-o-eye'),
                EditAction::make()->icon('heroicon-o-pencil'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->icon('heroicon-o-trash'),
                ])->icon('heroicon-o-cog-6-tooth'),
            ]);
    }
}
