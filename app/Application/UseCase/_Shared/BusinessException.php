<?php

declare(strict_types=1);

namespace App\Application\UseCase\_Shared;

use App\Infrastructure\Http\Controller\_Shared\Constants\ErrorCode;
use Hyperf\Server\Exception\ServerException;
use Throwable;

class BusinessException extends ServerException
{
    public function __construct(int $code = 0, ?string $message = null, ?Throwable $previous = null)
    {
        if (is_null($message)) {
            $message = ErrorCode::getMessage($code);
        }

        parent::__construct($message, $code, $previous);
    }
}
