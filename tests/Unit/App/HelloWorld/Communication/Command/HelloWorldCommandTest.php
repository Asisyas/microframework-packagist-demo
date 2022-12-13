<?php

declare(strict_types=1);

namespace Unit\App\HelloWorld\Communication\Command;

use App\HelloWorld\Communication\Command\HelloWorldCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommandTest extends TestCase
{
    private HelloWorldCommand $command;
    private InputInterface $input;
    private OutputInterface $output;

    public function setUp(): void
    {
        $this->command = new HelloWorldCommand();
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