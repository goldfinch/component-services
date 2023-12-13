<?php

namespace Goldfinch\Component\Services\Pages\Nest;

use Goldfinch\Component\Services\Controllers\Nest\ServicesController;
use Goldfinch\Nest\Pages\Nest;

class Services extends Nest
{
    private static $table_name = 'Services';
    private static $controller_name = ServicesController::class;

    private static $icon_class = 'font-icon-block-bookmark';
}
