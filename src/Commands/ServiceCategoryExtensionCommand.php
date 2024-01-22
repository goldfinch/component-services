<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-services:ext:category')]
class ServiceCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:ext:category';

    protected $description = 'Create ServiceCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-services category extension';

    protected $stub = './stubs/servicecategory-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
