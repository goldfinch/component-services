<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-services:config')]
class ServicesConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:config';

    protected $description = 'Create Services YML config';

    protected $path = 'app/_config';

    protected $type = 'config';

    protected $stub = './stubs/config.stub';

    protected $extension = '.yml';
}
