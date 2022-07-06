<?php

namespace App\Story;

use Zenstruck\Foundry\Story;

final class IngredientStory extends Story
{
    public function build(): void
    {

    }

    private function getIngredientData(): array
    {
        return [
            ['name' => 'potato', 'price' => 2000]
        ];
    }
}
