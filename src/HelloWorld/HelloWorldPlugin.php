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

namespace App\HelloWorld;

use App\HelloWorld\Communication\Controller\HelloWorldController;
use App\HelloWorld\Facade\HelloWorldFacade;
use App\HelloWorld\Facade\HelloWorldFacadeInterface;
use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\DependencyProviderInterface;
use Micro\Kernel\App\AppKernelInterface;
use Micro\Plugin\Http\Facade\HttpFacadeInterface;
use Micro\Plugin\Http\Plugin\RouteProviderPluginInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HelloWorldPlugin implements DependencyProviderInterface, RouteProviderPluginInterface
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

    public function provideRoutes(HttpFacadeInterface $httpFacade): iterable
    {
        yield $httpFacade
            ->createRouteBuilder()
            ->setController(HelloWorldController::class)
            ->setUri('/')
            ->setName('index')
            ->build();
    }
}
