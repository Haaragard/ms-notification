<?php

namespace Test\Unit\Infrastructure\Http\Resource\_Shared\Error;

use App\Infrastructure\Http\Resource\_Shared\Error\BusinessErrorResource;
use PHPUnit\Framework\Attributes\Test;
use Test\TestCase;

class BusinessErrorResourceTest extends TestCase
{
    #[Test]
    public function shouldToArray(): void
    {
        // Arrange
        $message = 'Some business error message.';
        $resource = new BusinessErrorResource($message);
        $expected = [
            'message' => $message,
        ];

        // Act
        $resourceArray = $resource->toArray();

        // Assert
        $this->assertEquals($expected, $resourceArray);
    }
}
