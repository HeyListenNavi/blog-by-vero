<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class WelcomeWidget extends Widget
{
    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';

    protected string $view = 'filament.widgets.welcome-widget';

    protected function getViewData(): array
    {
        return [
            'user' => auth()->user(),
            'panelUrl' => config('app.panel_url'),
        ];
    }
}
