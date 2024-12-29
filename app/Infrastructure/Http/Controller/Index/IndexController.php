<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\Index;

use App\Infrastructure\Http\Controller\_Shared\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Swoole\Http\Status;

class IndexController extends AbstractController
{
    public function __invoke(): ResponseInterface
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return $this->response->json([
            'method' => $method,
            'message' => "Hello {$user}.",
        ])->withStatus(Status::OK);
    }
}
