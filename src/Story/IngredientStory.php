<?php

namespace App\Story;

use App\Factory\IngredientFactory;
use Zenstruck\Foundry\Story;

final class IngredientStory extends Story
{
    public function build(): void
    {
        foreach ($this->getIngredientData() as $ingredientData) {
            IngredientFactory::createOne($ingredientData);
        }
    }

    /**
     * @return array{array{name: string, price: int, weight: int}}
     */
    private function getIngredientData(): array
    {
        return [
            ['name' => 'potato', 'price' => 2000, 'weight' => 5],
            ['name' => 'onion', 'price' => 1000, 'weight' => 3],
            ['name' => 'cabbage', 'price' => 500, 'weight' => 2],
        ];
    }
}
