<?php

declare(strict_types=1);

namespace App\Demo;

use App\Demo\Business\Packagist\PackagistSearch;
use App\Demo\Business\Packagist\PackagistSearchInterface;
use App\Demo\Communication\Controller\PackagistSearchController;
use App\Demo\Facade\DemoAppFacade;
use App\Demo\Facade\DemoAppFacadeInterface;
use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\ConfigurableInterface;
use Micro\Framework\Kernel\Plugin\DependencyProviderInterface;
use Micro\Framework\Kernel\Plugin\PluginConfigurationTrait;
use Micro\Plugin\Http\Facade\HttpFacadeInterface;
use Micro\Plugin\Http\Plugin\RouteProviderPluginInterface;
use Micro\Plugin\Twig\Plugin\TwigTemplatePluginInterface;
use Micro\Plugin\Twig\Plugin\TwigTemplatePluginTrait;

/**
 * @method DemoAppPluginConfiguration configuration()
 */
class DemoAppPlugin implements DependencyProviderInterface, TwigTemplatePluginInterface, ConfigurableInterface, RouteProviderPluginInterface
{
    use PluginConfigurationTrait;
    use TwigTemplatePluginTrait;

    public function provideDependencies(Container $container): void
    {
        $container->register(DemoAppFacadeInterface::class, fn () => $this->createFacade());
    }

    protected function createFacade(): DemoAppFacadeInterface
    {
        return new DemoAppFacade($this->createPackagistSearchService());
    }

    protected function createPackagistSearchService(): PackagistSearchInterface
    {
        return new PackagistSearch($this->configuration());
    }

    public function provideRoutes(HttpFacadeInterface $httpFacade): iterable
    {
        yield $httpFacade->createRouteBuilder()
            ->setUri('/')
            ->setController(PackagistSearchController::class)
            ->setName('search')
            ->build()
        ;
    }
}
