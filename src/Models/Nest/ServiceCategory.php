<?php

namespace Goldfinch\Component\Services\Models\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Mill\Traits\Millable;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\Controller;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Services\Configs\ServiceConfig;
use Goldfinch\Component\Services\Pages\Nest\ServicesByCategory;

class ServiceCategory extends NestedObject
{
    use FielderTrait, Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = ServicesByCategory::class;
    public static $nest_down_parents = [];

    private static $table_name = 'ServiceCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [
        'Content' => 'HTMLText',
    ];

    private static $belongs_many_many = [
        'Items' => ServiceItem::class,
    ];

    private static $summary_fields = [
        'Items.Count' => 'Services',
    ];

    private static $searchable_list_fields = [
        'Title', 'Content',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
            ],
        ]);
    }

    public function List()
    {
        if (Controller::has_curr()) {
            $ctrl = Controller::curr();

            $cfg = ServiceConfig::current_config();

            return PaginatedList::create($this->Items(), $ctrl->getRequest())->setPageLength($cfg->ItemsPerPage ?? 10);
        }
    }

    public function OtherCategories($type = 'mix', $limit = 6, $escapeEmpty = true)
    {
        $filter = ['ID:not' => $this->ID];

        if ($escapeEmpty) {
            $filter['Items.Count():GreaterThan'] = 0;
        }

        return ServiceCategory::get()->filter($filter)->shuffle()->limit($limit);
    }
}
