<?php

namespace App\Filament\Resources\PhotographyPosts\Schemas;

use App\Models\Icon;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class PhotographyPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Select::make('icon_id')
                    ->relationship('icon', 'id')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('path')
                            ->image()
                            ->required(),
                    ])
                    ->editOptionForm([
                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('path')
                            ->image()
                            ->required(),
                    ])
                    ->allowHtml()
                    ->getOptionLabelFromRecordUsing(fn(Icon $icon) => new HtmlString("
                        <div style='display: flex; align-items: center; gap: 10px;'>
                            <img src='{$icon->path}' alt='{$icon->name}' style='width: 48px; height: 48px; object-fit: cover;'>
                            <span>{$icon->name}</span>
                        </div>
                    ")),

                MarkdownEditor::make('description')
                    ->required()
                    ->columnSpan('full'),

                Repeater::make('photographies')
                    ->relationship('photographies')
                    ->grid(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        FileUpload::make('path')
                            ->image()
                            ->required(),
                    ]),
            ]);
    }
}
