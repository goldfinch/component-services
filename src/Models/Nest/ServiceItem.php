<?php

namespace Goldfinch\Component\Services\Models\Nest;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\Control\Director;
use SilverStripe\TagField\TagField;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Services\Admin\ServicesAdmin;
use Goldfinch\Component\Services\Pages\Nest\Services;
use Goldfinch\FocusPointExtra\Forms\UploadFieldWithExtra;
use Goldfinch\Component\Services\Models\Nest\ServiceCategory;

class ServiceItem extends NestedObject
{
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

    // private static $has_one = [];
    // private static $belongs_to = [];
    // private static $has_many = [];
    // private static $belongs_many_many = [];
    // private static $default_sort = null;
    // private static $indexes = null;
    // private static $owns = [];
    // private static $casting = [];
    // private static $defaults = [];

    // private static $summary_fields = [];
    // private static $field_labels = [];
    // private static $searchable_fields = [];

    // private static $cascade_deletes = [];
    // private static $cascade_duplicates = [];

    // * goldfinch/helpers
    private static $field_descriptions = [];
    private static $required_fields = [
        'Title',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab(
            'Root.Main',
            [
                ...UploadFieldWithExtra::create('Image', 'Image', $fields, $this)->getFields(),
                ...[
                    TextField::create('Title', 'Title'),
                    TagField::create('Categories', 'Categories', ServiceCategory::get())
                ],
            ]
        );

        $fields->dataFieldByName('Image')->setFolderName('services');

        return $fields;
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

    // public function validate()
    // {
    //     $result = parent::validate();

    //     // $result->addError('Error message');

    //     return $result;
    // }

    // public function onBeforeWrite()
    // {
    //     // ..

    //     parent::onBeforeWrite();
    // }

    // public function onBeforeDelete()
    // {
    //     // ..

    //     parent::onBeforeDelete();
    // }

    // public function canView($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canEdit($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canDelete($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canCreate($member = null, $context = [])
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }
}
