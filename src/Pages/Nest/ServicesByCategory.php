<?php

namespace Goldfinch\Component\Services\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Component\Services\Controllers\Nest\ServicesByCategoryController;

class ServicesByCategory extends Nest
{
    private static $table_name = 'ServicesByCategory';

    private static $controller_name = ServicesByCategoryController::class;

    private static $icon_class = 'font-icon-block-bookmark';

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->ShowInMenus = 0;
        $this->ShowInSearch = 0;
    }
}

