<?php

declare(strict_types=1);

namespace App\Demo\Business\Packagist;

use App\Demo\DemoAppPluginConfiguration;

readonly class PackagistSearch implements PackagistSearchInterface
{
    public function __construct(
        private DemoAppPluginConfiguration $pluginConfiguration
    ) {
    }

    public function search(string $query): array
    {
        $query = trim($query);
        if (!$query) {
            return [];
        }

        $url = sprintf(
            '%s/search.json?q=%s',
            $this->pluginConfiguration->getPackagistUrl(),
            urlencode($query)
        );

        $results = file_get_contents($url);
        if (false === $results) {
            throw new \RuntimeException(sprintf('Fetching query from `%s` can not be processed right now.', $url));
        }

        return json_decode($results, true);
    }
}
