<?php

declare(strict_types=1);

namespace App\Demo\Communication\Controller;

use App\Demo\Facade\DemoAppFacadeInterface;
use Micro\Plugin\Twig\TwigFacadeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

readonly class PackagistSearchController
{
    public function __construct(
        private DemoAppFacadeInterface $packagistFacade,
        private TwigFacadeInterface $twigFacade
    ) {
    }

    public function search(Request $request): Response
    {
        $query = (string) $request->get('q');
        $exception = null;
        $results = null;
        try {
            $results = $this->packagistFacade->search($query);
        } catch (\RuntimeException $exception) {
        }

        $rendered = $this->twigFacade->render('@DemoAppPlugin/Packagist/search.html.twig', [
            'query' => $query,
            'results' => $results,
            'exception' => $exception,
        ]);

        return new Response($rendered);
    }
}
