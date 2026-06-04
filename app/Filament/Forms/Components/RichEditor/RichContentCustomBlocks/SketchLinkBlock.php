<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use App\Models\Sketch;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Select;

class SketchLinkBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'sketch-link';
    }

    public static function getLabel(): string
    {
        return 'Link to Sketch';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Select a sketch to link to')
            ->schema([
                Select::make('sketch_id')
                    ->label('Sketch')
                    ->options(Sketch::pluck('title', 'id'))
                    ->required()
                    ->searchable(),
            ]);
    }

    public static function toPreviewHtml(array $config): string
    {
        $sketch = Sketch::find($config['sketch_id'] ?? null);

        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.sketch-link.preview', [
            'title' => $sketch?->title ?? 'Sketch not found',
        ])->render();
    }

    public static function toHtml(array $config, array $data): string
    {
        $sketch = Sketch::find($config['sketch_id'] ?? null);

        if (! $sketch) {
            return '';
        }

        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.sketch-link.index', [
            'sketch' => $sketch,
        ])->render();
    }
}
