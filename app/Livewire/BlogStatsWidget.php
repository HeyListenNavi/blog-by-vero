<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\PhotographyPost;
use App\Models\Post;
use App\Models\Thought;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BlogStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count())
                ->description('Registered Profiles')
                ->descriptionIcon('heroicon-s-user-group'),

            Stat::make('Comments', Comment::count())
                ->description('All-time comments')
                ->descriptionIcon('heroicon-s-chat-bubble-left-right'),

            Stat::make('Posts', Post::count() + PhotographyPost::count())
                ->description('Blog + photography posts')
                ->descriptionIcon('heroicon-s-document-text'),

            Stat::make('Thoughts', Thought::count())
                ->description('Thoughts shared')
                ->descriptionIcon('heroicon-s-light-bulb'),
        ];
    }
}
