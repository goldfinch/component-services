<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-services:ext:admin')]
class ServicesAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:ext:admin';

    protected $description = 'Create ServicesAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/servicesadmin-extension.stub';

    protected $prefix = 'Extension';
}
