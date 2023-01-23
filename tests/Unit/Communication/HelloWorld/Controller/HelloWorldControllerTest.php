<?php

namespace Unit\Communication\HelloWorld\Controller;

use App\Communication\HelloWorld\Controller\HelloWorldController;
use App\Shared\HelloWorld\HelloWorldFacadeInterface;
use Micro\Plugin\Twig\TwigFacadeInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class HelloWorldControllerTest extends TestCase
{
    public function testIndex()
    {
        $helloMessage = 'Success!';
        $helloWorldFacadeMock = $this->createMock(HelloWorldFacadeInterface::class);
        $helloWorldFacadeMock
            ->expects($this->once())->method('greet')
            ->withAnyParameters()
            ->willReturn($helloMessage)
        ;

        $twigFacade = $this->createMock(TwigFacadeInterface::class);
        $twigFacade
            ->expects($this->once())
            ->method('render')
            ->with('@HelloWorld/home.html.twig', ['message' => $helloMessage])
            ->willReturn($helloMessage);

        $requestMock = $this->createMock(Request::class);

        $helloWorldController = new HelloWorldController($helloWorldFacadeMock, $twigFacade);
        $response = $helloWorldController->home($requestMock);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($helloMessage, $response->getContent());
    }
}
