<?php

namespace Goldfinch\Component\Services\Models\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Services\Pages\Nest\ServicesByCategory;

class ServiceCategory extends NestedObject
{
    use FielderTrait;

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

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [$fielder->string('Title')],
        ]);
    }
}
