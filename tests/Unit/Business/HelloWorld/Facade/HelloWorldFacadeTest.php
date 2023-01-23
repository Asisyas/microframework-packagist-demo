<?php

declare(strict_types=1);

/**
 * This file is part of the Micro framework package.
 *
 * (c) Stanislau Komar <head.trackingsoft@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unit\Business\HelloWorld\Facade;

use App\Business\HelloWorld\Facade\HelloWorldFacade;
use Micro\Kernel\App\AppKernelInterface;
use PHPUnit\Framework\TestCase;

class HelloWorldFacadeTest extends TestCase
{
    public function testGreed()
    {
        $kernel = $this->createMock(AppKernelInterface::class);
        $kernel->method('environment')->willReturn('test');
        $facade = new HelloWorldFacade($kernel);

        $this->assertEquals('Hello, World! You are on the test environment', $facade->greet());
        $this->assertEquals('Hello, Username! You are on the test environment', $facade->greet('Username'));
    }
}
