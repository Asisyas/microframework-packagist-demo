<?php

declare(strict_types=1);

namespace App\HelloWorld\Communication\Controller;

use App\HelloWorld\Facade\HelloWorldFacadeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController
{
    public function __construct(private HelloWorldFacadeInterface $helloWorldFacade)
    {
    }

    public function index(Request $request): Response
    {
        $name = (string) $request->get('name');
        $message = $this->helloWorldFacade->greet($name);

        return new Response($message);
    }
}
