<?php

declare(strict_types=1);

namespace App\Application\UseCase\User\Create;

class UserCreateInput
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {
    }
}
