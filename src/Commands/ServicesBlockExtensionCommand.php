<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-services:ext:block')]
class ServicesBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:ext:block';

    protected $description = 'Create ServicesBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/servicesblock-extension.stub';

    protected $prefix = 'Extension';
}
