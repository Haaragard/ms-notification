<?php

namespace Test\Unit\Infrastructure\Http\Resource\_Shared\Error;

use App\Infrastructure\Http\Resource\_Shared\Error\UnexpectedErrorResource;
use PHPUnit\Framework\Attributes\Test;
use Test\TestCase;

class UnexpectedErrorResourceTest extends TestCase
{
    #[Test]
    public function shouldToArray(): void
    {
        // Arrange
        $resource = new UnexpectedErrorResource();
        $expected = [
            'message' => 'An unexpected error occurred.',
        ];

        // Act
        $resourceArray = $resource->toArray();

        // Assert
        $this->assertEquals($expected, $resourceArray);
    }
}
