<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class RatingSelect extends Field
{
    protected string $view = 'forms.components.rating-select';

    protected int $stars = 5;

    public function stars(int $stars): static
    {
        $this->stars = $stars;

        return $this;
    }

    public function getStars(): int
    {
        return $this->stars;
    }
}
