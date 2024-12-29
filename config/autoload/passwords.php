<?php

declare(strict_types=1);

use function Hyperf\Support\env;

return [
    'algo' => PASSWORD_BCRYPT,
    'cost' => env('APP_PASSWORD_COST', 10),
];
