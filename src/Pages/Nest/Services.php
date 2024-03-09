<?php

namespace Goldfinch\Component\Services\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Component\Services\Models\Nest\ServiceItem;
use Goldfinch\Component\Services\Models\Nest\ServiceCategory;
use Goldfinch\Component\Services\Pages\Nest\ServicesByCategory;
use Goldfinch\Component\Services\Controllers\Nest\ServicesController;

class Services extends Nest
{
    use Millable;

    private static $table_name = 'Services';

    private static $controller_name = ServicesController::class;

    private static $allowed_children = [ServicesByCategory::class];

    private static $icon_class = 'font-icon-block-bookmark';

    private static $defaults = [
        'NestedObject' => ServiceItem::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        // ..

        return $fields;
    }

    public function getSettingsFields()
    {
        $fields = parent::getSettingsFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->disable(['NestedObject', 'NestedPseudo']);

        return $fields;
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
