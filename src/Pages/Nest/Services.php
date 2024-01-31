<?php

namespace Goldfinch\Component\Services\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Services\Models\Nest\ServiceItem;
use Goldfinch\Component\Services\Models\Nest\ServiceCategory;
use Goldfinch\Component\Services\Pages\Nest\ServicesByCategory;
use Goldfinch\Component\Services\Controllers\Nest\ServicesController;

class Services extends Nest
{
    use FielderTrait, Millable;

    private static $table_name = 'Services';

    private static $controller_name = ServicesController::class;

    private static $allowed_children = [ServicesByCategory::class];

    private static $icon_class = 'font-icon-block-bookmark';

    private static $defaults = [
        'NestedObject' => ServiceItem::class,
    ];

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function fielderSettings(Fielder $fielder): void
    {
        $fielder->disable(['NestedObject', 'NestedPseudo']);
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = ServiceItem::class;
        $this->NestedPseudo = 0;
    }

    public function Categories()
    {
        return ServiceCategory::get();
    }
}
