<?php

declare(strict_types=1);

namespace App\Application\UseCase\User\Create;

use App\Domain\User\Entity\UserEntity;
use App\Domain\User\Repository\UserRepositoryInterface;
use Hyperf\Di\Annotation\Inject;

class UserCreateUseCase implements UserCreateUseCaseInterface
{
    #[Inject]
    protected UserRepositoryInterface $userRepository;

    public function execute(UserCreateInput $input): UserCreateOutput
    {
        $entity = new UserEntity(
            $input->name,
            $input->email,
            $input->password
        );

        $this->createUser($entity);

        return new UserCreateOutput();
    }

    private function createUser(UserEntity $entity): void
    {
        $this->userRepository->create($entity);
    }
}
