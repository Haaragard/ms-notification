<?php

declare(strict_types=1);

namespace Test\Unit\Application\UseCase\User\Create;

use App\Application\UseCase\User\Create\UserCreateOutput;
use PHPUnit\Framework\Attributes\Test;
use Test\TestCase;

class UserCreateOutputTest extends TestCase
{
    #[Test]
    public function shouldInstantiateSuccessfully(): void
    {
        // Arrange

        // Act
        $output = new UserCreateOutput();

        // Assert
        $this->assertInstanceOf(UserCreateOutput::class, $output);
    }
}
