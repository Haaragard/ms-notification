<?php

declare(strict_types=1);

namespace Test\Fixture\Domain\_Shared;

use App\Domain\_Shared\Entity;

abstract class EntityFixtureAbstract
{
    protected static string $entityClass;

    abstract public static function data(array $data = []): array;

    public static function entity(array $data = []): Entity
    {
        $preparedData = static::data($data);

        return new static::$entityClass(...$preparedData);
    }
}
