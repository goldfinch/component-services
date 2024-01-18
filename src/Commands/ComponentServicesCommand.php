<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-services')]
class ComponentServicesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services';

    protected $description = 'Populate goldfinch/component-services components';

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-services:serviceitem',
        );
        $input = new ArrayInput(['name' => 'ServiceItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:servicecategory',
        );
        $input = new ArrayInput(['name' => 'ServiceCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:serviceconfig',
        );
        $input = new ArrayInput(['name' => 'ServiceConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:servicesblock',
        );
        $input = new ArrayInput(['name' => 'ServicesBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-services:templates',
        );
        $input = new ArrayInput([]);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-services:config');
        $input = new ArrayInput(['name' => 'component-services']);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
