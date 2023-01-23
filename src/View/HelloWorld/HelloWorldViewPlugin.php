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

namespace App\View\HelloWorld;

use Micro\Plugin\Twig\Plugin\TwigTemplatePluginInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HelloWorldViewPlugin implements TwigTemplatePluginInterface
{
    public function getTwigTemplatePaths(): array
    {
        return [
            __DIR__.'/templates',
        ];
    }

    public function getTwigNamespace(): ?string
    {
        return 'HelloWorld';
    }

    public function isTwigTemplatesPrepend(): bool
    {
        return true;
    }
}
