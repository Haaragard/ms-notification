<?php

declare(strict_types=1);

use App\Infrastructure\Http\Controller\Health\HealthController;
use App\Infrastructure\Http\Controller\Index\IndexController;
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', IndexController::class);

Router::get('/favicon.ico', function () {
    return '';
});

Router::get('/health', HealthController::class);
