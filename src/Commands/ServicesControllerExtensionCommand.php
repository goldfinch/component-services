<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-services:ext:controller')]
class ServicesControllerExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:ext:controller';

    protected $description = 'Create ServicesController extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/servicescontroller-extension.stub';

    protected $suffix = 'Extension';
}
