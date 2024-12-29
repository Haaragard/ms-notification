<?php

declare(strict_types=1);

namespace Test;

use Hyperf\Context\ApplicationContext;
use Hyperf\Contract\ContainerInterface;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected ContainerInterface $container;

    protected function setUp(): void
    {
        parent::setUp();

        $this->container = ApplicationContext::getContainer();
    }
}
