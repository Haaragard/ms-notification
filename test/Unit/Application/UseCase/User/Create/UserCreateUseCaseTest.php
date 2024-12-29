<?php

declare(strict_types=1);

namespace Test\Unit\Application\UseCase\User\Create;

use App\Application\UseCase\User\Create\UserCreateInput;
use App\Application\UseCase\User\Create\UserCreateOutput;
use App\Application\UseCase\User\Create\UserCreateUseCase;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\Repository\UserRepositoryInterface;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use Test\Fixture\Domain\User\UserEntityEntityFixture;
use Test\TestCase;

class UserCreateUseCaseTest extends TestCase
{
    protected UserRepositoryInterface|MockObject $userRepository;

    protected UserCreateUseCase $useCase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->container->set(UserRepositoryInterface::class, $this->userRepository);

        $this->useCase = $this->container->make(UserCreateUseCase::class);
    }

    #[Test]
    public function shouldCreateUserSuccessfully(): void
    {
        // Arrange
        $userData = UserEntityEntityFixture::data();
        $input = new UserCreateInput(...$userData);

        $this->userRepository->expects($this->once())
            ->method('create')
            ->with($this->isInstanceOf(UserEntity::class));

        // Act
        $output = $this->useCase->execute($input);

        // Assert
    }
}
