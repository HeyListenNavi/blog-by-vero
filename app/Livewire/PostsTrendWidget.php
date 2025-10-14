<?php

namespace App\Livewire;

use App\Models\PhotographyPost;
use App\Models\Post;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PostsTrendWidget extends ChartWidget
{
    protected ?string $heading = 'Posts';

    protected ?string $pollingInterval = null;

    protected function getData(): array
    {
        $postData = Trend::model(Post::class)
            ->dateAlias('created_at') 
            ->between(
                start: now()->subMonths(6),
                end: now(),
            )
            ->perMonth()
            ->count();

        $photoData = Trend::model(PhotographyPost::class)
            ->between(
                start: now()->subMonths(6),
                end: now(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Normal Posts',
                    'data' => $postData->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#eabbb9',
                    'borderColor' => '#eabbb9',
                ],
                [
                    'label' => 'Photography Posts',
                    'data' => $photoData->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#b3cbf2',
                    'borderColor' => '#b3cbf2',
                ],
            ],
            'labels' => $postData->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
