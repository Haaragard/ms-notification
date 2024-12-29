<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\Health;

use App\Infrastructure\Http\Controller\_Shared\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Swoole\Http\Status;

class HealthController extends AbstractController
{
    public function __invoke(): ResponseInterface
    {
        return $this->response->json([
            'status' => 'Ok',
        ])->withStatus(Status::OK);
    }
}
