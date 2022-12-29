<?php

declare(strict_types=1);

namespace App\HelloWorld\Communication\Controller;

use App\HelloWorld\Facade\HelloWorldFacadeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController
{
    /**
     * @param HelloWorldFacadeInterface $helloWorldFacade
     */
    public function __construct(private HelloWorldFacadeInterface $helloWorldFacade)
    {
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        $name = (string) $request->get('name');
        $message = $this->helloWorldFacade->greet($name);

        return new Response($message);
    }
}
