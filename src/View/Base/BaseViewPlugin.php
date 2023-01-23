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

namespace App\View\Base;

use Micro\Plugin\Twig\Plugin\TwigTemplatePluginInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class BaseViewPlugin implements TwigTemplatePluginInterface
{
    public function getTwigTemplatePaths(): array
    {
        return [
            __DIR__.'/templates',
        ];
    }

    public function getTwigNamespace(): ?string
    {
        return null;
    }

    public function isTwigTemplatesPrepend(): bool
    {
        return false;
    }
}
