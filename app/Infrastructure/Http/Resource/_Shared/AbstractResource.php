<?php

namespace App\Infrastructure\Http\Resource\_Shared;

use Hyperf\Contract\Arrayable;

abstract class AbstractResource implements Arrayable
{
    abstract public function toArray(): array;
}
