<?php

namespace Goldfinch\Component\Services\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Services\Controllers\Nest\ServicesController;

class Services extends Nest
{
    use FielderTrait;

    private static $table_name = 'Services';

    private static $controller_name = ServicesController::class;

    private static $icon_class = 'font-icon-block-bookmark';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function fielderSettings(Fielder $fielder): void
    {
        // ..
    }
}

