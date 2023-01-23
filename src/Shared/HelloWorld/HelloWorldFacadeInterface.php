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

namespace App\Shared\HelloWorld;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface HelloWorldFacadeInterface
{
    public function greet(string $name = null): string;
}