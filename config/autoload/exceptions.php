<?php

declare(strict_types=1);

use App\Infrastructure\Config\Handler\AppExceptionHandler;
use App\Infrastructure\Config\Handler\ValidationExceptionHandler;
use Hyperf\HttpServer\Exception\Handler\HttpExceptionHandler;

return [
    'handler' => [
        'http' => [
            ValidationExceptionHandler::class,
            HttpExceptionHandler::class,
            AppExceptionHandler::class,
        ],
    ],
];
