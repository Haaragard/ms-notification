<?php

namespace App\Infrastructure\Http\Resource\_Shared\Error;

use App\Infrastructure\Http\Resource\_Shared\AbstractResource;

class BusinessErrorResource extends AbstractResource
{
    public function __construct(protected string $message)
    {
    }

    public function toArray(): array
    {
        return [
            'message' => $this->message,
        ];
    }
}
