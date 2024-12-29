<?php

declare(strict_types=1);

namespace Test\Unit\Application\UseCase\User\Create;

use App\Application\UseCase\User\Create\UserCreateInput;
use PHPUnit\Framework\Attributes\Test;
use Test\TestCase;
use Test\Fixture\Domain\User\UserEntityEntityFixture;

class UserCreateInputTest extends TestCase
{
    #[Test]
    public function shouldInstantiateSuccessfully(): void
    {
        // Arrange
        $userData = UserEntityEntityFixture::data();

        // Act
        $input = new UserCreateInput(...$userData);

        // Assert
        $this->assertEquals($userData['name'], $input->name);
        $this->assertEquals($userData['email'], $input->email);
        $this->assertEquals($userData['password'], $input->password);
    }
}
