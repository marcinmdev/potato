<?php

namespace App\Factory;

use App\Entity\Ingredient;
use App\Repository\IngredientRepository;
use JetBrains\PhpStorm\ArrayShape;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Ingredient>
 *
 * @method static Ingredient|Proxy createOne(array $attributes = [])
 * @method static Ingredient[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Ingredient|Proxy find(object|array|mixed $criteria)
 * @method static Ingredient|Proxy findOrCreate(array $attributes)
 * @method static Ingredient|Proxy first(string $sortedField = 'id')
 * @method static Ingredient|Proxy last(string $sortedField = 'id')
 * @method static Ingredient|Proxy random(array $attributes = [])
 * @method static Ingredient|Proxy randomOrCreate(array $attributes = [])
 * @method static Ingredient[]|Proxy[] all()
 * @method static Ingredient[]|Proxy[] findBy(array $attributes)
 * @method static Ingredient[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Ingredient[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static IngredientRepository|RepositoryProxy repository()
 * @method Ingredient|Proxy create(array|callable $attributes = [])
 */
final class IngredientFactory extends ModelFactory
{

    #[ArrayShape(['name' => "string", 'price' => "int"])]
    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->text(),
            'price' => self::faker()->randomNumber(),
        ];
    }

    protected static function getClass(): string
    {
        return Ingredient::class;
    }
}
