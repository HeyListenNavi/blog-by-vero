<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\FileUpload;
use App\Models\Icon;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('title')
                    ->required(),

                DatePicker::make('date')
                    ->native(false)
                    ->placeholder(now()->startOfMonth())
                    ->defaultFocusedDate(now()->startOfMonth())
                    ->required(),

                Select::make('icon_id')
                    ->relationship('icon', 'id')
                    ->searchable()
                    ->preload()
                    ->columnSpanFull()
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

                MarkdownEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
