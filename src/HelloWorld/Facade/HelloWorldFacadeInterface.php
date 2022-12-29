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

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface HelloWorldFacadeInterface
{
    /**
     * @param string|null $name
     *
     * @return string
     */
    public function greet(string $name = null): string;
}
