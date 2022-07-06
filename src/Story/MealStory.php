<?php

namespace App\Story;

use App\Factory\IngredientFactory;
use App\Factory\MealFactory;
use Zenstruck\Foundry\Story;

final class MealStory extends Story
{
    public function build(): void
    {
        $potato = IngredientFactory::findBy(['name' => 'potato'])[0];
        $cabbage = IngredientFactory::findBy(['name' => 'cabbage'])[0];

        MealFactory::createOne(['name' => 'Vegetable Salad', 'ingredients' => [$potato, $cabbage]]);
    }
}
