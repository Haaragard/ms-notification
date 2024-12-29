<?php

declare(strict_types=1);

namespace app\Infrastructure\Persistence\Mongodb\Repository\User;

use App\Domain\_Shared\Entity;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(Entity|UserEntity $entity): void
    {
        // TODO: Implement create() method.
    }
}
