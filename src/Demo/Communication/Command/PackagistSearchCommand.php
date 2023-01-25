<?php

declare(strict_types=1);

/**
 * This file is part of the Micro framework package.
 *
 * (c) Stanislau Komar <head.trackingsoft@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Demo\Communication\Command;

use App\Demo\Facade\DemoAppFacadeInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class PackagistSearchCommand extends Command
{
    public function __construct(private readonly DemoAppFacadeInterface $facade)
    {
        parent::__construct('packagist:search');
    }

    public function configure(): void
    {
        $this->addArgument('q', InputArgument::REQUIRED, 'Search query string.', null);
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $query = $input->getArgument('q');
        $queryResult = $this->facade->search($query);
        $tableHeaders = [
            'name',
            'description',
            'favers',
        ];
        $tableRows = [];
        foreach ($queryResult['results'] as $result) {
            $row = [];
            foreach ($tableHeaders as $key) {
                $row[] = $result[$key];
            }

            $tableRows[] = $row;
        }

        $table = new Table($output);
        $table
            ->setHeaders($tableHeaders)
            ->setRows($tableRows)
        ;
        $table->render();

        return self::SUCCESS;
    }
}
