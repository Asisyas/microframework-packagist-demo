<?php

return [
    App\Demo\DemoAppPlugin::class,

    // Separate system plugins from appliction plugins.
    Micro\Plugin\Configuration\Helper\ConfigurationHelperPlugin::class,
    Micro\Plugin\Console\ConsolePlugin::class,
    Micro\Plugin\Http\HttpPackPlugin::class,
    Micro\Plugin\Logger\Monolog\MonologPlugin::class,
    Micro\Plugin\Doctrine\DoctrinePlugin::class,
    Micro\Plugin\Twig\TwigPlugin::class,
    OleksiiBulba\WebpackEncorePlugin\WebpackEncorePlugin::class,
];