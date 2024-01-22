<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-services:ext:page')]
class ServicesExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:ext:page';

    protected $description = 'Create Services page extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/services-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
