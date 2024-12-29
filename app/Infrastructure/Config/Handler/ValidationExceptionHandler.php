<?php

declare(strict_types=1);

namespace App\Infrastructure\Config\Handler;

use App\Infrastructure\Http\Resource\_Shared\Error\FailedValidationResourceResource;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Validation\ValidationException;
use Hyperf\Validation\ValidationExceptionHandler as HyperfValidationExceptionHandler;
use Swow\Psr7\Message\ResponsePlusInterface;
use Throwable;

class ValidationExceptionHandler extends HyperfValidationExceptionHandler
{
    public function handle(Throwable $throwable, ResponsePlusInterface $response)
    {
        $this->stopPropagation();
        /** @var ValidationException $throwable */
        if (! $response->hasHeader('content-type')) {
            $response = $response->addHeader('content-type', 'application/json; charset=utf-8');
        }

        $validationErrorResource = new FailedValidationResourceResource($throwable->validator->errors());

        return $response->setStatus($throwable->status)
            ->setBody(new SwooleStream(json_encode($validationErrorResource->toArray())));
    }
}
