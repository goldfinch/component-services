<?php

namespace Goldfinch\Component\Services\Pages\Nest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Services\Controllers\Nest\ServicesController;

class Services extends Nest
{
    use HarvestTrait;

    private static $table_name = 'Services';

    private static $controller_name = ServicesController::class;

    private static $icon_class = 'font-icon-block-bookmark';

    public function harvest(Harvest $harvest): void
    {
        // ..
    }

    public function harvestSettings(Harvest $harvest): void
    {
        // ..
    }
}

