<?php

namespace Test\Unit\Infrastructure\Http\Controller;

use App\Application\UseCase\_Shared\BusinessException;
use App\Application\UseCase\User\Create\UserCreateOutput;
use App\Application\UseCase\User\Create\UserCreateUseCaseInterface;
use App\Infrastructure\Http\Controller\User\CreateUserController;
use App\Infrastructure\Http\Request\User\CreateUserRequest;
use Exception;
use Hyperf\HttpServer\Contract\ResponseInterface;
use PHPUnit\Framework\Attributes\Test;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;
use Test\TestCase;

class CreateUserControllerTest extends TestCase
{
    #[Test]
    public function shouldCreateSuccessfully(): void
    {
        // Arrange
        $psrResponseMock = $this->createMock(PsrResponseInterface::class);
        $psrResponseMock->expects($this->once())
            ->method('withStatus')
            ->with(201)
            ->willReturn($psrResponseMock);

        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->expects($this->once())
            ->method('json')
            ->with(['message' => 'Created successfully.'])
            ->willReturn($psrResponseMock);

        $this->container->set(ResponseInterface::class, $responseMock);

        $requestMock = $this->createMock(CreateUserRequest::class);
        $requestMock->expects($this->once())
            ->method('validated')
            ->willReturn([
                'name' => 'John Doe',
                'email' => 'john.doe@test.test',
                'password' => 'password1234@',
            ]);

        $useCase = $this->createMock(UserCreateUseCaseInterface::class);
        $useCase->expects($this->once())
            ->method('execute')
            ->with($this->callback(function ($input) {
                return $input->name === 'John Doe'
                    && $input->email === 'john.doe@test.test'
                    && $input->password === 'password1234@';
            }))
            ->willReturn(new UserCreateOutput());
        $this->container->set(UserCreateUseCaseInterface::class, $useCase);

        $controller = $this->container->make(CreateUserController::class);

        // Act
        $controller($requestMock);

        // Assert
    }

    #[Test]
    public function shouldThrowBusinessException(): void
    {
        // Arrange
        $psrResponseMock = $this->createMock(PsrResponseInterface::class);
        $psrResponseMock->expects($this->once())
            ->method('withStatus')
            ->with(422)
            ->willReturn($psrResponseMock);

        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->expects($this->once())
            ->method('json')
            ->with(['message' => 'Business error thrown.'])
            ->willReturn($psrResponseMock);

        $this->container->set(ResponseInterface::class, $responseMock);

        $requestMock = $this->createMock(CreateUserRequest::class);
        $requestMock->expects($this->once())
            ->method('validated')
            ->willReturn([
                'name' => 'John Doe',
                'email' => 'john.doe@test.test',
                'password' => 'password1234@',
            ]);

        $useCase = $this->createMock(UserCreateUseCaseInterface::class);
        $useCase->expects($this->once())
            ->method('execute')
            ->with($this->callback(function ($input) {
                return $input->name === 'John Doe'
                    && $input->email === 'john.doe@test.test'
                    && $input->password === 'password1234@';
            }))
            ->willThrowException(new BusinessException(422, 'Business error thrown.'));
        $this->container->set(UserCreateUseCaseInterface::class, $useCase);

        $controller = $this->container->make(CreateUserController::class);

        // Act
        $controller($requestMock);

        // Assert
    }

    #[Test]
    public function shouldThrowGenericException(): void
    {
        // Arrange
        $psrResponseMock = $this->createMock(PsrResponseInterface::class);
        $psrResponseMock->expects($this->once())
            ->method('withStatus')
            ->with(500)
            ->willReturn($psrResponseMock);

        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->expects($this->once())
            ->method('json')
            ->with(['message' => 'An unexpected error occurred.'])
            ->willReturn($psrResponseMock);

        $this->container->set(ResponseInterface::class, $responseMock);

        $requestMock = $this->createMock(CreateUserRequest::class);
        $requestMock->expects($this->once())
            ->method('validated')
            ->willReturn([
                'name' => 'John Doe',
                'email' => 'john.doe@test.test',
                'password' => 'password1234@',
            ]);

        $useCase = $this->createMock(UserCreateUseCaseInterface::class);
        $useCase->expects($this->once())
            ->method('execute')
            ->with($this->callback(function ($input) {
                return $input->name === 'John Doe'
                    && $input->email === 'john.doe@test.test'
                    && $input->password === 'password1234@';
            }))
            ->willThrowException(new Exception());
        $this->container->set(UserCreateUseCaseInterface::class, $useCase);

        $controller = $this->container->make(CreateUserController::class);

        // Act
        $controller($requestMock);

        // Assert
    }
}
