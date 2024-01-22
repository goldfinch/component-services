<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-services:templates')]
class ServicesTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:templates';

    protected $description = 'Publish [goldfinch/component-services] templates';

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-services');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPath = BASE_PATH . '/vendor/goldfinch/component-services/templates/Goldfinch/Component/Services/';
            $themePath = 'themes/' . $theme . '/templates/Goldfinch/Component/Services/';

            $files = [
                [
                    'from' => $componentPath . 'Blocks/ServicesBlock.ss',
                    'to' => $themePath . 'Blocks/ServicesBlock.ss',
                ],
                [
                    'from' => $componentPath . 'Models/Nest/ServiceItem.ss',
                    'to' => $themePath . 'Models/Nest/ServiceItem.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Services.ss',
                    'to' => $themePath . 'Pages/Nest/Services.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
