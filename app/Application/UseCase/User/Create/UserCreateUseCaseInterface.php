<?php

namespace App\Application\UseCase\User\Create;

interface UserCreateUseCaseInterface
{
    public function execute(UserCreateInput $input): UserCreateOutput;
}
