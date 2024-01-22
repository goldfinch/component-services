<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-services:ext:config')]
class ServiceConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:ext:config';

    protected $description = 'Create ServiceConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-services config extension';

    protected $stub = './stubs/serviceconfig-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
