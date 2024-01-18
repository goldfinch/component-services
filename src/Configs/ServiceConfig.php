<?php

namespace Goldfinch\Component\Services\Configs;

use Goldfinch\Harvest\Harvest;
use SilverStripe\ORM\DataObject;
use JonoM\SomeConfig\SomeConfig;
use Goldfinch\Harvest\Traits\HarvestTrait;
use SilverStripe\View\TemplateGlobalProvider;

class ServiceConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, HarvestTrait;

    private static $table_name = 'ServiceConfig';

    private static $db = [];

    public function harvest(Harvest $harvest): void
    {
        // ..
    }
}
