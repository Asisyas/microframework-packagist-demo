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

namespace App\Plugin\HelloWorld;

use App\Business\HelloWorld\HelloWorldPluginBusiness;
use App\Communication\HelloWorld\HelloWorldCommunicationPlugin;
use App\Model\HelloWorld\HelloWorldModelPlugin;
use App\View\HelloWorld\HelloWorldViewPlugin;
use Micro\Framework\Kernel\Plugin\PluginDependedInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HelloWorldPlugin implements PluginDependedInterface
{
    public function getDependedPlugins(): iterable
    {
        return [
            HelloWorldPluginBusiness::class,
            HelloWorldViewPlugin::class,
            HelloWorldCommunicationPlugin::class,
            HelloWorldModelPlugin::class,
        ];
    }
}
