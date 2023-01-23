<?php

declare(strict_types=1);

namespace Unit\Communication\HelloWorld\Command;

use App\Communication\HelloWorld\Command\HelloWorldCommand;
use App\Shared\HelloWorld\HelloWorldFacadeInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommandTest extends TestCase
{
    private HelloWorldCommand $command;
    private InputInterface $input;
    private OutputInterface $output;

    protected function setUp(): void
    {
        $helloWorldFacadeMock = $this->createMock(HelloWorldFacadeInterface::class);
        $helloWorldFacadeMock
            ->expects($this->once())->method('greet')
            ->withAnyParameters()
            ->willReturn('Hello, World !')
        ;

        $this->command = new HelloWorldCommand(
            $helloWorldFacadeMock
        );
        $this->input = $this
            ->createMock(InputInterface::class);

        $this->output = $this
            ->createMock(OutputInterface::class)
        ;
    }

    public function testExecute(): void
    {
        $this->input->expects($this->once())->method('getArgument')->with('name');
        $this->output->expects($this->once())->method('writeln');

        $result = $this->command->execute($this->input, $this->output);

        $this->assertEquals(Command::SUCCESS, $result);
    }
}
