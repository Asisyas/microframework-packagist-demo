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

namespace App\Business\HelloWorld;

use App\Business\HelloWorld\Facade\HelloWorldFacade;
use App\Shared\HelloWorld\HelloWorldFacadeInterface;
use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\DependencyProviderInterface;
use Micro\Kernel\App\AppKernelInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HelloWorldPluginBusiness implements DependencyProviderInterface
{
    public function provideDependencies(Container $container): void
    {
        $container->register(HelloWorldFacadeInterface::class, function (
            AppKernelInterface $kernel,
        ) {
            return $this->createHelloWorldFacade($kernel);
        });
    }

    protected function createHelloWorldFacade(AppKernelInterface $kernel): HelloWorldFacadeInterface
    {
        return new HelloWorldFacade($kernel);
    }
}
