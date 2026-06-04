<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use App\Models\Post;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Select;

class PostLinkBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'post-link';
    }

    public static function getLabel(): string
    {
        return 'Link to Post';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Select a post to link to')
            ->schema([
                Select::make('post_id')
                    ->label('Post')
                    ->options(Post::pluck('title', 'id'))
                    ->required()
                    ->searchable(),
            ]);
    }

    public static function toPreviewHtml(array $config): string
    {
        $post = Post::find($config['post_id'] ?? null);

        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.post-link.preview', [
            'title' => $post?->title ?? 'Post not found',
        ])->render();
    }

    public static function toHtml(array $config, array $data): string
    {
        $post = Post::find($config['post_id'] ?? null);

        if (! $post) {
            return '';
        }

        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.post-link.index', [
            'post' => $post,
        ])->render();
    }
}
