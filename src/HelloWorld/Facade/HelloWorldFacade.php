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

namespace App\HelloWorld\Facade;

use Micro\Kernel\App\AppKernelInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
readonly class HelloWorldFacade implements HelloWorldFacadeInterface
{
    public function __construct(private AppKernelInterface $appKernel)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function greet(string $name = null): string
    {
        if (!$name) {
            $name = 'World';
        }

        return sprintf(
            'Hello, %s! You are on the %s environment',
            $name,
            $this->appKernel->environment()
        );
    }
}
