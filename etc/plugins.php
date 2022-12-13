<?php

$isCli = php_sapi_name() == 'cli';

$pluginsWeb = [
    Micro\Plugin\Http\HttpPlugin::class,
];

$pluginsCli = [
    Micro\Plugin\Console\ConsolePlugin::class,
];

$pluginsCommon = [
    Micro\Plugin\Logger\Monolog\MonologPlugin::class,
    Micro\Plugin\Configuration\Helper\ConfigurationHelperPlugin::class,
    Micro\Plugin\Locator\LocatorPlugin::class,
];

$pluginShared = [
    App\HelloWorld\HelloWorldPlugin::class,
];

return array_merge($pluginsCommon, $pluginShared, ($isCli ?  $pluginsCli: $pluginsWeb));
