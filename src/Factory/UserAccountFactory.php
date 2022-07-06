<?php

namespace App\Factory;

use App\Entity\UserAccount;
use App\Repository\UserRepository;
use JetBrains\PhpStorm\ArrayShape;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<UserAccount>
 *
 * @method static            UserAccount|Proxy createOne(array $attributes = [])
 * @method static            UserAccount[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static            UserAccount|Proxy find(object|array|mixed $criteria)
 * @method static            UserAccount|Proxy findOrCreate(array $attributes)
 * @method static            UserAccount|Proxy first(string $sortedField = 'id')
 * @method static            UserAccount|Proxy last(string $sortedField = 'id')
 * @method static            UserAccount|Proxy random(array $attributes = [])
 * @method static            UserAccount|Proxy randomOrCreate(array $attributes = [])
 * @method static            UserAccount[]|Proxy[] all()
 * @method static            UserAccount[]|Proxy[] findBy(array $attributes)
 * @method static            UserAccount[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static            UserAccount[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static            UserRepository|RepositoryProxy repository()
 * @method UserAccount|Proxy create(array|callable $attributes = [])
 */
final class UserAccountFactory extends ModelFactory
{
    #[ArrayShape(['email' => 'string', 'roles' => 'array', 'password' => 'string'])]
    protected function getDefaults(): array
    {
        return [
            'email' => self::faker()->text(),
            'roles' => [],
            'password' => self::faker()->text(),
        ];
    }

    protected static function getClass(): string
    {
        return UserAccount::class;
    }
}
