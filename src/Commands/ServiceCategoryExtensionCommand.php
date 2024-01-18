<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-services:servicecategory')]
class ServiceCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:servicecategory';

    protected $description = 'Create ServiceCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-services category extension';

    protected $stub = 'servicecategory-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
