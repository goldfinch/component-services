<?php

namespace Goldfinch\Component\Services\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-services:templates')]
class ServicesTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-services:templates';

    protected $description = 'Publish [goldfinch/component-services] templates';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-services');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPathTemplates = BASE_PATH . '/vendor/goldfinch/component-services/templates/';
            $componentPath = $componentPathTemplates . 'Goldfinch/Component/Services/';
            $themeTemplates = 'themes/' . $theme . '/templates/';
            $themePath = $themeTemplates . 'Goldfinch/Component/Services/';

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
                    'from' => $componentPath . 'Models/Nest/ServiceCategory.ss',
                    'to' => $themePath . 'Models/Nest/ServiceCategory.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Services.ss',
                    'to' => $themePath . 'Pages/Nest/Services.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/ServicesByCategory.ss',
                    'to' => $themePath . 'Pages/Nest/ServicesByCategory.ss',
                ],
                [
                    'from' => $componentPath . 'Partials/ServiceFilter.ss',
                    'to' => $themePath . 'Partials/ServiceFilter.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Services/Models/Nest/ServiceCategory.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Services/Models/Nest/ServiceCategory.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Services/Models/Nest/ServiceItem.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Services/Models/Nest/ServiceItem.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
