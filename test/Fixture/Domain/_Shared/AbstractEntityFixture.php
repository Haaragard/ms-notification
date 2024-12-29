<?php

declare(strict_types=1);

namespace Test\Fixture\Domain\_Shared;

use App\Domain\_Shared\AbstractEntity;

abstract class AbstractEntityFixture
{
    protected static string $entityClass;

    abstract public static function data(array $data = []): array;

    public static function entity(array $data = []): AbstractEntity
    {
        $preparedData = static::data($data);

        return new static::$entityClass(...$preparedData);
    }
}
