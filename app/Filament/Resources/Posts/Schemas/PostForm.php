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
                    ->createOptionForm(fn($schema) => IconForm::configure($schema))
                    ->editOptionForm(fn($schema) => IconForm::configure($schema))
                    ->allowHtml()
                    ->getOptionLabelFromRecordUsing(fn(Icon $icon) => view('components.icon-option', compact('icon')))
                    ->required()
                    ->columnSpanFull(),

                MarkdownEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
