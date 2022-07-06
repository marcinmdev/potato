<?php

namespace App\Factory;

use App\Entity\Meal;
use App\Repository\MealRepository;
use JetBrains\PhpStorm\ArrayShape;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Meal>
 *
 * @method static Meal|Proxy createOne(array $attributes = [])
 * @method static Meal[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Meal|Proxy find(object|array|mixed $criteria)
 * @method static Meal|Proxy findOrCreate(array $attributes)
 * @method static Meal|Proxy first(string $sortedField = 'id')
 * @method static Meal|Proxy last(string $sortedField = 'id')
 * @method static Meal|Proxy random(array $attributes = [])
 * @method static Meal|Proxy randomOrCreate(array $attributes = [])
 * @method static Meal[]|Proxy[] all()
 * @method static Meal[]|Proxy[] findBy(array $attributes)
 * @method static Meal[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Meal[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static MealRepository|RepositoryProxy repository()
 * @method Meal|Proxy create(array|callable $attributes = [])
 */
final class MealFactory extends ModelFactory
{
    #[ArrayShape(['name' => "string"])]
    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->text(),
        ];
    }

    protected static function getClass(): string
    {
        return Meal::class;
    }
}
