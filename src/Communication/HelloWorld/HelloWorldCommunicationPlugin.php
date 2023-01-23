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

namespace App\Communication\HelloWorld;

use App\Communication\HelloWorld\Controller\HelloWorldController;
use Micro\Plugin\Http\Facade\HttpFacadeInterface;
use Micro\Plugin\Http\Plugin\RouteProviderPluginInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HelloWorldCommunicationPlugin implements RouteProviderPluginInterface
{
    public function provideRoutes(HttpFacadeInterface $httpFacade): iterable
    {
        yield $httpFacade
            ->createRouteBuilder()
            ->setController(HelloWorldController::class)
            ->setUri('/')
            ->setName('home')
            ->build();
    }
}
