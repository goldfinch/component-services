<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-services')]
class ServicesSetCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services';

    protected $description = 'Set of all [goldfinch/component-services] commands';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-services:ext:admin',
        );
        $input = new ArrayInput(['name' => 'ServicesAdmin']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:ext:config',
        );
        $input = new ArrayInput(['name' => 'ServiceConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:ext:block',
        );
        $input = new ArrayInput(['name' => 'ServicesBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:ext:page',
        );
        $input = new ArrayInput(['name' => 'Services']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:ext:controller',
        );
        $input = new ArrayInput(['name' => 'ServicesController']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:ext:item',
        );
        $input = new ArrayInput(['name' => 'ServiceItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:ext:category',
        );
        $input = new ArrayInput(['name' => 'ServiceCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-services:config');
        $input = new ArrayInput(['name' => 'component-services']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:templates',
        );
        $input = new ArrayInput([]);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
