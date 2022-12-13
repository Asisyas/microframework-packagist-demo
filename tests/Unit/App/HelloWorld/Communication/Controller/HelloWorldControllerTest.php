<?php

namespace Unit\App\HelloWorld\Communication\Controller;

use App\HelloWorld\Communication\Controller\HelloWorldController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class HelloWorldControllerTest extends TestCase
{

    public function testIndex()
    {
        $requestMock = $this->createMock(Request::class);

        $helloWorldController = new HelloWorldController();
        $response = $helloWorldController->index($requestMock);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Hello, World!', $response->getContent());
    }
}
