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
        $command = $this->getApplication()->find('vendor:component-services:ext:admin');
        $command->run(new ArrayInput(['name' => 'ServicesAdmin']), $output);

        $command = $this->getApplication()->find('vendor:component-services:ext:config');
        $command->run(new ArrayInput(['name' => 'ServiceConfig']), $output);

        $command = $this->getApplication()->find('vendor:component-services:ext:block');
        $command->run(new ArrayInput(['name' => 'ServicesBlock']), $output);

        $command = $this->getApplication()->find('vendor:component-services:ext:page');
        $command->run(new ArrayInput(['name' => 'Services']), $output);

        $command = $this->getApplication()->find('vendor:component-services:ext:controller');
        $command->run(new ArrayInput(['name' => 'ServicesController']), $output);

        $command = $this->getApplication()->find('vendor:component-services:ext:item');
        $command->run(new ArrayInput(['name' => 'ServiceItem']), $output);

        $command = $this->getApplication()->find('vendor:component-services:ext:category');
        $command->run(new ArrayInput(['name' => 'ServiceCategory']), $output);

        $command = $this->getApplication()->find('vendor:component-services:config');
        $command->run(new ArrayInput(['name' => 'component-services']), $output);

        $command = $this->getApplication()->find('vendor:component-services:templates');
        $command->run(new ArrayInput([]), $output);

        return Command::SUCCESS;
    }
}
