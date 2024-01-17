<?php

namespace Goldfinch\Component\Services\Models\Nest;

use Goldfinch\Harvest\Harvest;
use SilverStripe\Assets\Image;
use SilverStripe\Control\Director;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Services\Admin\ServicesAdmin;
use Goldfinch\Component\Services\Pages\Nest\Services;

class ServiceItem extends NestedObject
{
    use HarvestTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Services::class;
    public static $nest_down_parents = [];

    private static $table_name = 'ServiceItem';
    private static $singular_name = 'service';
    private static $plural_name = 'services';

    private static $db = [];

    private static $many_many = [
        'Categories' => ServiceCategory::class,
    ];

    private static $many_many_extraFields = [
        'Categories' => [
            'SortExtra' => 'Int',
        ],
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
        'Categories',
    ];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
    ];

    public function harvest(Harvest $harvest)
    {
        $harvest->require(['Title']);

        $harvest->fields([
            'Root.Main' => [
                $harvest->string('Title'),
                $harvest->tag('Categories'),
                ...$harvest->media('Image'),
            ],
        ]);

        $harvest->dataField('Image')->setFolderName('projects');
    }

    public function getNextItem()
    {
        return ServiceItem::get()->filter(['SortOrder:LessThan' => $this->SortOrder])->Sort('SortOrder DESC')->first();
    }

    public function getPreviousItem()
    {
        return ServiceItem::get()->filter(['SortOrder:GreaterThan' => $this->SortOrder])->first();
    }

    public function getOtherItems()
    {
        return ServiceItem::get()->filter('ID:not', $this->ID)->limit(6);
    }

    public function CMSEditLink()
    {
        $admin = new ServicesAdmin;
        return Director::absoluteBaseURL() . '/' . $admin->getCMSEditLinkForManagedDataObject($this);
    }
}
