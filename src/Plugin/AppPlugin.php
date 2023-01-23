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

namespace App\Plugin;

use App\Plugin\HelloWorld\HelloWorldPlugin;
use App\View\Base\BaseViewPlugin;
use Micro\Framework\Kernel\Plugin\PluginDependedInterface;

class AppPlugin implements PluginDependedInterface
{
    public function getDependedPlugins(): iterable
    {
        return [
            BaseViewPlugin::class,
            HelloWorldPlugin::class,
        ];
    }
}
