<?php

namespace App\Infrastructure\Http\Resource\_Shared\Error;

use App\Infrastructure\Http\Resource\_Shared\AbstractResource;

class UnexpectedErrorResource extends AbstractResource
{
    public function toArray(): array
    {
        return [
            'message' => 'An unexpected error occurred.',
        ];
    }
}
