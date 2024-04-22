<?php

namespace App\Factory;

use App\Entity\Rent;
use App\Repository\RentRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Rent>
 *
 * @method        Rent|Proxy create(array|callable $attributes = [])
 * @method static Rent|Proxy createOne(array $attributes = [])
 * @method static Rent|Proxy find(object|array|mixed $criteria)
 * @method static Rent|Proxy findOrCreate(array $attributes)
 * @method static Rent|Proxy first(string $sortedField = 'id')
 * @method static Rent|Proxy last(string $sortedField = 'id')
 * @method static Rent|Proxy random(array $attributes = [])
 * @method static Rent|Proxy randomOrCreate(array $attributes = [])
 * @method static RentRepository|RepositoryProxy repository()
 * @method static Rent[]|Proxy[] all()
 * @method static Rent[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Rent[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Rent[]|Proxy[] findBy(array $attributes)
 * @method static Rent[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Rent[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class RentFactory extends ModelFactory
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
            'Duration' => self::faker()->randomNumber(),
            'Item' => self::faker()->text(255),
            'Price' => self::faker()->randomNumber(),
            'user' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Rent $rent): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Rent::class;
    }
}
