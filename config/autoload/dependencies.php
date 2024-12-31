<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use App\Application\UseCase\User\Create\UserCreateUseCase;
use App\Application\UseCase\User\Create\UserCreateUseCaseInterface;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Infrastructure\Persistence\Mysql\Repository\User\UserRepository;

return [
    // Domain - User
    UserCreateUseCaseInterface::class => UserCreateUseCase::class,
    UserRepositoryInterface::class => UserRepository::class,
];
