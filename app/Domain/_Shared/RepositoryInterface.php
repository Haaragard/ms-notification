<?php

declare(strict_types=1);

namespace App\Domain\_Shared;

interface RepositoryInterface
{
    public function create(AbstractEntity $entity): AbstractEntity;
}
