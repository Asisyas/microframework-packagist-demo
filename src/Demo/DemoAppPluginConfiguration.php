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

namespace App\Demo;

use Micro\Framework\Kernel\Configuration\PluginConfiguration;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class DemoAppPluginConfiguration extends PluginConfiguration
{
    public const CFG_PACKAGIST_URL = 'PACKAGIST_URL';

    public function getPackagistUrl(): string
    {
        return rtrim($this->configuration->get(self::CFG_PACKAGIST_URL, 'https://packagist.org/'), '/');
    }
}
