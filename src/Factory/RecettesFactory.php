<?php

namespace App\Factory;

use App\Entity\Recettes;
use App\Repository\RecettesRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Recettes>
 *
 * @method        Recettes|Proxy create(array|callable $attributes = [])
 * @method static Recettes|Proxy createOne(array $attributes = [])
 * @method static Recettes|Proxy find(object|array|mixed $criteria)
 * @method static Recettes|Proxy findOrCreate(array $attributes)
 * @method static Recettes|Proxy first(string $sortedField = 'id')
 * @method static Recettes|Proxy last(string $sortedField = 'id')
 * @method static Recettes|Proxy random(array $attributes = [])
 * @method static Recettes|Proxy randomOrCreate(array $attributes = [])
 * @method static RecettesRepository|RepositoryProxy repository()
 * @method static Recettes[]|Proxy[] all()
 * @method static Recettes[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Recettes[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Recettes[]|Proxy[] findBy(array $attributes)
 * @method static Recettes[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Recettes[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class RecettesFactory extends ModelFactory
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
            'nbPersonnes' => self::faker()->randomNumber(),
            'nom' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Recettes $recettes): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Recettes::class;
    }
}
