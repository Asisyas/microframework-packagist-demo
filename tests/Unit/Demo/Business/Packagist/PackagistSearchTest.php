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

namespace Unit\Demo\Business\Packagist;

use App\Demo\Business\Packagist\PackagistSearch;
use App\Demo\Business\Packagist\PackagistSearchInterface;
use App\Demo\DemoAppPluginConfiguration;
use PHPUnit\Framework\TestCase;

class PackagistSearchTest extends TestCase
{
    private PackagistSearchInterface $packagistSearch;

    protected function setUp(): void
    {
        $pc = $this->createMock(DemoAppPluginConfiguration::class);
        $pc
            ->expects($this->once())
            ->method('getPackagistUrl')
            ->willReturn('https://packagist.org');

        $this->packagistSearch = new PackagistSearch($pc);
    }

    public function testSearch()
    {
        $this->assertIsArray($this->packagistSearch->search('micro'));
    }
}
