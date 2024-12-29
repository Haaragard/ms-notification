<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Mysql\Repository\User;

use App\Domain\_Shared\AbstractEntity;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(AbstractEntity|UserEntity $entity): AbstractEntity|UserEntity
    {
        // TODO: Implement create() method.
        return $entity;
    }
}
