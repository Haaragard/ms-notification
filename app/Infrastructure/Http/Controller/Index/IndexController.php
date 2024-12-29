<?php

declare(strict_types=1);

namespace app\Infrastructure\Http\Controller\Index;

use app\Infrastructure\Http\Controller\_Shared\AbstractController;

class IndexController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }
}
