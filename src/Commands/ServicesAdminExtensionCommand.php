<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-services:ext:admin')]
class ServicesAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:ext:admin';

    protected $description = 'Create ServicesAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/servicesadmin-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
