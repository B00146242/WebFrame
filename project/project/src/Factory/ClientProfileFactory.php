<?php

namespace App\Factory;

use App\Entity\ClientProfile;
use App\Repository\ClientProfileRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<ClientProfile>
 *
 * @method        ClientProfile|Proxy create(array|callable $attributes = [])
 * @method static ClientProfile|Proxy createOne(array $attributes = [])
 * @method static ClientProfile|Proxy find(object|array|mixed $criteria)
 * @method static ClientProfile|Proxy findOrCreate(array $attributes)
 * @method static ClientProfile|Proxy first(string $sortedField = 'id')
 * @method static ClientProfile|Proxy last(string $sortedField = 'id')
 * @method static ClientProfile|Proxy random(array $attributes = [])
 * @method static ClientProfile|Proxy randomOrCreate(array $attributes = [])
 * @method static ClientProfileRepository|RepositoryProxy repository()
 * @method static ClientProfile[]|Proxy[] all()
 * @method static ClientProfile[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static ClientProfile[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static ClientProfile[]|Proxy[] findBy(array $attributes)
 * @method static ClientProfile[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ClientProfile[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ClientProfileFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'Dob' => self::faker()->randomNumber(),
            'HistoryOfPurchase' => self::faker()->text(255),
            'RentalStatus' => self::faker()->boolean(),
            'age' => self::faker()->randomNumber(),
            'email' => self::faker()->text(255),
            'name' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(ClientProfile $clientProfile): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ClientProfile::class;
    }
}
