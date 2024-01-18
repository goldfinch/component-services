<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-services:config')]
class ComponentServicesConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:config';

    protected $description = 'Create component-services config';

    protected $path = 'app/_config';

    protected $type = 'component-services yml config';

    protected $stub = 'serviceconfig.stub';

    protected $extension = '.yml';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
