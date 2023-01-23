<?php

declare(strict_types=1);

namespace App\Communication\HelloWorld\Controller;

use App\Shared\HelloWorld\HelloWorldFacadeInterface;
use Micro\Plugin\Twig\TwigFacadeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController
{
    public function __construct(
        private HelloWorldFacadeInterface $helloWorldFacade,
        private TwigFacadeInterface $twigFacade
    ) {
    }

    public function home(Request $request): Response
    {
        $name = (string) $request->get('name');
        $message = $this->helloWorldFacade->greet($name);
        $rendered = $this->twigFacade->render('@HelloWorld/home.html.twig', [
            'message' => $message,
        ]);

        return new Response($rendered);
    }
}
