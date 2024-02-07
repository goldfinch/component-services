<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-services:ext:config')]
class ServiceConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:ext:config';

    protected $description = 'Create ServiceConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/serviceconfig-extension.stub';

    protected $suffix = 'Extension';
}
