<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Schemas\IconForm;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\FileUpload;
use App\Models\Icon;
use Filament\Schemas\Components\Section;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post Details')
                    ->icon('heroicon-o-document-text')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('date')
                            ->label('Date')
                            ->native(false)
                            ->placeholder(now()->startOfMonth())
                            ->defaultFocusedDate(now()->startOfMonth())
                            ->required(),
                        Select::make('icon_id')
                            ->label('Icon')
                            ->relationship('icon', 'id')
                            ->searchable()
                            ->preload()
                            ->createOptionForm(fn($schema) => IconForm::configure($schema))
                            ->editOptionForm(fn($schema) => IconForm::configure($schema))
                            ->allowHtml()
                            ->getOptionLabelFromRecordUsing(fn(Icon $icon) => view('components.icon-option', compact('icon')))
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make('Content')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->columnSpanFull()
                    ->schema([
                        MarkdownEditor::make('content')
                            ->label('Content')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
