<?php

namespace Unit\App\HelloWorld\Communication\Controller;

use App\HelloWorld\Communication\Controller\HelloWorldController;
use App\HelloWorld\Facade\HelloWorldFacadeInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class HelloWorldControllerTest extends TestCase
{
    public function testIndex()
    {
        $helloMessage = 'Hello, World!';
        $helloWorldFacadeMock = $this->createMock(HelloWorldFacadeInterface::class);
        $helloWorldFacadeMock
            ->expects($this->once())->method('greet')
            ->withAnyParameters()
            ->willReturn($helloMessage)
        ;

        $requestMock = $this->createMock(Request::class);

        $helloWorldController = new HelloWorldController($helloWorldFacadeMock);
        $response = $helloWorldController->index($requestMock);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($helloMessage, $response->getContent());
    }
}
