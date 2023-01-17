<?php

return [
    Micro\Plugin\Configuration\Helper\ConfigurationHelperPlugin::class,
    Micro\Plugin\Console\ConsolePlugin::class,
    \Micro\Plugin\Http\HttpPackPlugin::class,
    \Micro\Plugin\Logger\Monolog\MonologPlugin::class,

    App\HelloWorld\HelloWorldPlugin::class,
];