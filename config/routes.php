<?php

declare(strict_types=1);

use App\Infrastructure\Http\Controller\Health\HealthController;
use App\Infrastructure\Http\Controller\Index\IndexController;
use App\Infrastructure\Http\Controller\User\CreateUserController;
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', IndexController::class);

Router::get('/favicon.ico', function () {
    return '';
});

Router::get('/health', HealthController::class);

Router::addGroup('/v1', static function () {
    Router::addGroup('/users', static function () {
        Router::post('', CreateUserController::class);
    });
});
