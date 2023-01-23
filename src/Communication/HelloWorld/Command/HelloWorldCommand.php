<?php

declare(strict_types=1);

namespace App\Communication\HelloWorld\Command;

use App\Shared\HelloWorld\HelloWorldFacadeInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command
{
    public function __construct(private HelloWorldFacadeInterface $helloWorldFacade)
    {
        parent::__construct('app:hello-world');
    }

    public function configure(): void
    {
        $this->addArgument('name', InputArgument::OPTIONAL, 'Who do you need to say hello to?', null);
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $message = $this->helloWorldFacade->greet($name);

        $output->writeln($message);

        return self::SUCCESS;
    }
}
