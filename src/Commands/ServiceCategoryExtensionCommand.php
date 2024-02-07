<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-services:ext:category')]
class ServiceCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:ext:category';

    protected $description = 'Create ServiceCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/servicecategory-extension.stub';

    protected $prefix = 'Extension';
}
