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
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\Service\UserService;
use App\Domain\User\Service\UserServiceInterface;
use App\Infrastructure\Persistence\Mysql\Repository\User\UserRepository;

return [
    // Domain - User
    UserServiceInterface::class => UserService::class,
    UserRepositoryInterface::class => UserRepository::class,
];
