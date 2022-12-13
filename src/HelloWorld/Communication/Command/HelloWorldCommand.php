<?php

declare(strict_types=1);

namespace App\HelloWorld\Communication\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command
{
    public function __construct()
    {
        parent::__construct('app:hello-world');
    }

    public function configure()
    {
        $this->addArgument('name', InputArgument::OPTIONAL, 'Who do you need to say hello to?', 'world');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('Hello, %s!', $input->getArgument('name')));

        return self::SUCCESS;
    }
}