<?php

declare(strict_types=1);

namespace Test\Unit\Domain\User\Entity;

use App\Domain\User\Entity\UserEntity;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Test\Fixture\Domain\User\UserEntityEntityFixture;

class UserEntityTest extends TestCase
{
    #[Test]
    public function shouldInstantiateSuccessfully(): void
    {
        // Arrange
        $userData = UserEntityEntityFixture::data();

        // Act
        $entity = new UserEntity(
            $userData['name'],
            $userData['email'],
            $userData['password']
        );

        // Assert
        $this->assertInstanceOf(UserEntity::class, $entity);
        $this->assertEquals($userData['name'], $entity->getName());
        $this->assertEquals($userData['email'], $entity->getEmail());
        $this->assertTrue($entity->passwordVerify($userData['password']));
    }
}
