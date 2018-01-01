<?php
/**
 * This file is part of byrokrat\giroapp.
 *
 * byrokrat\giroapp is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * byrokrat\giroapp is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with byrokrat\giroapp. If not, see <http://www.gnu.org/licenses/>.
 *
 * Copyright 2016-18 Hannes Forsgård
 */

declare(strict_types = 1);

namespace byrokrat\giroapp\Console;

use byrokrat\giroapp\DependencyInjection\ProjectServiceContainer;
use Streamer\Stream;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\StreamOutput;

/**
 * Manage the container and execute command
 */
class CommandWrapper extends Command
{
    /**
     * @var string
     */
    private $commandClass;

    public function __construct(string $commandClass)
    {
        $this->commandClass = $commandClass;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->commandClass::configure($this);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $container = new ProjectServiceContainer;

        $container->set(InputInterface::CLASS, $input);
        $container->set('std_out', $output);
        $container->set('err_out', new StreamOutput(STDERR, $output->getVerbosity()));
        $container->set('std_in', new Stream(STDIN));
        $container->set(QuestionHelper::CLASS, $this->getHelper('question'));

        /** @var CommandInterface $command */
        $command = $container->get($this->commandClass);

        /** @var CommandRunner $runner */
        $runner = $container->get(CommandRunner::CLASS);

        return $runner->run($command);
    }
}
