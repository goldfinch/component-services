<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-services:ext:item')]
class ServiceItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:ext:item';

    protected $description = 'Create ServiceItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/serviceitem-extension.stub';

    protected $prefix = 'Extension';
}
