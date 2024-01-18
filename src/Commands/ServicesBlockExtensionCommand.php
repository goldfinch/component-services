<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-services:servicesblock')]
class ServicesBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:servicesblock';

    protected $description = 'Create ServicesBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-services block extension';

    protected $stub = 'servicesblock-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
