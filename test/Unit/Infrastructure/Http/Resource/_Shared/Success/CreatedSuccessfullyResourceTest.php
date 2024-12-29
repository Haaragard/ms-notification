<?php

namespace Test\Unit\Infrastructure\Http\Resource\_Shared\Success;

use App\Infrastructure\Http\Resource\_Shared\Success\CreatedSuccessfullyResource;
use PHPUnit\Framework\Attributes\Test;
use Test\TestCase;

class CreatedSuccessfullyResourceTest extends TestCase
{
    #[Test]
    public function shouldToArray(): void
    {
        // Arrange
        $resource = new CreatedSuccessfullyResource();
        $expected = [
            'message' => 'Created successfully.',
        ];

        // Act
        $resourceArray = $resource->toArray();

        // Assert
        $this->assertEquals($expected, $resourceArray);
    }
}
