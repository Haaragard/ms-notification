<?php

namespace App\Infrastructure\Http\Resource\_Shared\Error;

use App\Infrastructure\Http\Resource\_Shared\AbstractResource;
use Hyperf\Contract\MessageBag;

class FailedValidationResourceResource extends AbstractResource
{
    public function __construct(protected MessageBag $messageBag)
    {
    }

    public function toArray(): array
    {
        return [
            'message' => 'The given data was invalid.',
            'errors' => $this->messageBag->toArray(),
            'field_errors' => $this->messageBag->keys(),
        ];
    }
}
