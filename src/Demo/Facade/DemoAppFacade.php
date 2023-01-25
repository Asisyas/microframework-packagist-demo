<?php

declare(strict_types=1);

namespace App\Demo\Facade;

use App\Demo\Business\Packagist\PackagistSearchInterface;

readonly class DemoAppFacade implements DemoAppFacadeInterface
{
    public function __construct(private PackagistSearchInterface $packagistSearch)
    {
    }

    public function search(string $query): array
    {
        return $this->packagistSearch->search($query);
    }
}
