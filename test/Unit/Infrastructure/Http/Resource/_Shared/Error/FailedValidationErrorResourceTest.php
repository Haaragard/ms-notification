<?php

namespace Test\Unit\Infrastructure\Http\Resource\_Shared\Error;

use App\Infrastructure\Http\Resource\_Shared\Error\FailedValidationErrorResource;
use Hyperf\Contract\MessageBag;
use PHPUnit\Framework\Attributes\Test;
use Test\TestCase;

class FailedValidationErrorResourceTest extends TestCase
{
    #[Test]
    public function shouldToArray(): void
    {
        // Arrange
        $messageBagMock = $this->createMock(MessageBag::class);
        $messageBagMock->expects($this->once())
            ->method('getMessages')
            ->willReturn([
                'field' => ['Some error message.'],
                'field2' => ['Some error message2.'],
            ]);
        $messageBagMock->expects($this->once())
            ->method('keys')
            ->willReturn(['field', 'field2']);

        $resource = new FailedValidationErrorResource($messageBagMock);
        $expected = [
            'message' => 'The given data was invalid.',
            'errors' => [
                'field' => ['Some error message.'],
                'field2' => ['Some error message2.'],
            ],
            'field_errors' => ['field', 'field2'],
        ];

        // Act
        $resourceArray = $resource->toArray();

        // Assert
        $this->assertEquals($expected, $resourceArray);
    }
}
