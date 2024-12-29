<?php

namespace App\Infrastructure\Http\Resource\_Shared\Success;

use App\Infrastructure\Http\Resource\_Shared\AbstractResource;

class CreatedSuccessfullyResource extends AbstractResource
{
    public function toArray(): array
    {
        return [
            'message' => 'Created successfully.',
        ];
    }
}
