<?php

namespace Goldfinch\Component\Services\Commands;

use Symfony\Component\Finder\Finder;
use Goldfinch\Taz\Services\InputOutput;
use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Question\ChoiceQuestion;

#[AsCommand(name: 'templates:component-services')]
class ComponentServicesTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'templates:component-services';

    protected $description = 'Publish component-services templates into your theme folder';

    protected function execute($input, $output): int
    {
        $io = new InputOutput($input, $output);

        $themes = Finder::create()
            ->in(THEMES_PATH)
            ->depth(0)
            ->directories();

        $ssTheme = null;

        if (!$themes || !$themes->count()) {
            $io->text('Themes not found');

            return Command::SUCCESS;
        } elseif ($themes->count() > 1) {
            // choose theme

            $availableThemes = [];

            foreach ($themes as $theme) {
                $availableThemes[] = $theme->getFilename();
            }

            $helper = $this->getHelper('question');
            $question = new ChoiceQuestion(
                'Which templete?',
                $availableThemes,
                0,
            );
            $question->setErrorMessage('Theme %s is invalid.');
            $theme = $helper->ask($input, $output, $question);
        } else {
            foreach ($themes as $themeItem) {
                $theme = $themeItem->getFilename();
            }
        }

        if (isset($theme) && $theme) {
            $this->copyTemplates($theme);

            $io->text('Done');

            return Command::SUCCESS;
        }

        return Command::FAILURE;
    }

    private function copyTemplates($theme)
    {
        $fs = new Filesystem();

        $fs->copy(
            BASE_PATH .
                '/vendor/goldfinch/component-services/templates/Goldfinch/Component/Services/Blocks/ServicesBlock.ss',
            'themes/' .
                $theme .
                '/templates/Goldfinch/Component/Services/Blocks/ServicesBlock.ss',
        );

        $fs->copy(
            BASE_PATH .
                '/vendor/goldfinch/component-services/templates/Goldfinch/Component/Services/Models/Nest/ServiceItem.ss',
            'themes/' .
                $theme .
                '/templates/Goldfinch/Component/Services/Models/Nest/ServiceItem.ss',
        );

        $fs->copy(
            BASE_PATH .
                '/vendor/goldfinch/component-services/templates/Goldfinch/Component/Services/Pages/Nest/Services.ss',
            'themes/' .
                $theme .
                '/templates/Goldfinch/Component/Services/Pages/Nest/Services.ss',
        );
    }
}
