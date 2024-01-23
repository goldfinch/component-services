<?php

namespace Goldfinch\Component\Services\Models\Nest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Services\Pages\Nest\ServicesByCategory;

class ServiceCategory extends NestedObject
{
    use HarvestTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = ServicesByCategory::class;
    public static $nest_down_parents = [];

    private static $table_name = 'ServiceCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [];

    private static $belongs_many_many = [
        'Items' => ServiceItem::class,
    ];

    public function harvest(Harvest $harvest): void
    {
        $harvest->require(['Title']);

        $harvest->fields([
            'Root.Main' => [$harvest->string('Title')],
        ]);
    }
}
