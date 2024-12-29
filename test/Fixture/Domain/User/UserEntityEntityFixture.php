<?php

declare(strict_types=1);

namespace Test\Fixture\Domain\User;

use App\Domain\User\Entity\UserEntity;
use Test\Fixture\Domain\_Shared\EntityFixtureAbstract;

class UserEntityEntityFixture extends EntityFixtureAbstract
{
    protected static string $entityClass = UserEntity::class;

    public static function data(array $data = []): array
    {
        return [
            'name' => $data['name'] ?? 'John Doe',
            'email' => $data['email'] ?? random_bytes(10) . '@example.com',
            'password' => $data['password'] ?? 'password',
        ];
    }
}
