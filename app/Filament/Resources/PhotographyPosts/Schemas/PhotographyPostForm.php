<?php

namespace App\Filament\Resources\PhotographyPosts\Schemas;

use App\Filament\Schemas\IconForm;
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
                    ->createOptionForm(fn ($schema) => IconForm::configure($schema))
                    ->editOptionForm(fn ($schema) => IconForm::configure($schema))
                    ->allowHtml()
                    ->getOptionLabelFromRecordUsing(fn(Icon $icon) => view('components.icon-option', compact('icon'))),

                MarkdownEditor::make('description')
                    ->required()
                    ->columnSpanFull(),

                Repeater::make('photographies')
                    ->relationship('photographies')
                    ->grid(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        FileUpload::make('path')
                            ->disk('public')
                            ->directory('photographies')
                            ->image()
                            ->downloadable()
                            ->required(),
                    ]),
            ]);
    }
}
