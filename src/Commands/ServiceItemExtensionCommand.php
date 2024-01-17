<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-services-serviceitem')]
class ServiceItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services-serviceitem';

    protected $description = 'Create ServiceItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-services item extension';

    protected $stub = 'serviceitem-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
