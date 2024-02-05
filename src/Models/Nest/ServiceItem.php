<?php

namespace Goldfinch\Component\Services\Models\Nest;

use Goldfinch\Fielder\Fielder;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataList;
use SilverStripe\Control\Director;
use Goldfinch\Mill\Traits\Millable;
use SilverStripe\Control\HTTPRequest;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Services\Admin\ServicesAdmin;
use Goldfinch\Component\Services\Pages\Nest\Services;
use Goldfinch\Component\Services\Configs\ServiceConfig;
use Goldfinch\Component\Services\Models\Nest\ServiceItem;
use Goldfinch\Component\Services\Models\Nest\ServiceCategory;

class ServiceItem extends NestedObject
{
    use FielderTrait, Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Services::class;
    public static $nest_down_parents = [];

    private static $table_name = 'ServiceItem';
    private static $singular_name = 'service';
    private static $plural_name = 'services';

    private static $db = [
        'Content' => 'HTMLText',
    ];

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

    private static $owns = ['Image', 'Categories'];

    private static $summary_fields = [
        'Categories.Count' => 'Categories',
    ];

    private static $searchable_list_fields = [
        'Title', 'Content',
    ];

    public function GridItemSummaryList()
    {
        $list = parent::GridItemSummaryList();

        $list['Image'] = $this->Image()->CMSThumbnail();

        return $list;
    }

    public function summaryFields()
    {
        $fields = parent::summaryFields();

        $cfg = ServiceConfig::current_config();

        if ($cfg->DisabledCategories) {
            unset($fields['Categories.Count']);
        }

        return $fields;
    }

    public function fielder(Fielder $fielder): void
    {
        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
                $fielder->tag('Categories'),
                ...$fielder->media('Image'),
            ],
        ]);

        $fielder->dataField('Image')->setFolderName('services');

        $cfg = ServiceConfig::current_config();

        if ($cfg->DisabledCategories) {
            $fielder->remove('Categories');
        }
    }

    // type : mix | inside | outside
    public function OtherItems($type = 'mix', $limit = 6)
    {
        $model = ServiceItem::get()->filter(['ID:not' => $this->ID])->shuffle();

        if ($type == 'mix') {
            //
        } else if ($type == 'inside') {
            $categories = $this->Categories()->column('ID');

            if (count($categories)) {
                $model = $model->filterAny('Categories.ID', $categories);
            }
        } else if ($type == 'outside') {
            $categories = $this->Categories()->column('ID');

            if (count($categories)) {
                $model = $model->filterAny('Categories.ID:not', $categories);
            }
        }

        return $model->limit($limit);
    }

    public function CMSEditLink()
    {
        $admin = new ServicesAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }

    /**
     * Extend nested listExtraFilter by adding additional filter option (category)
     */
    public static function listExtraFilter(DataList $list, HTTPRequest $request): DataList
    {
        $list = parent::listExtraFilter($list, $request);

        $filter = [];

        if ($request->getVar('category'))
        {
            $filter['Categories.URLSegment'] = $request->getVar('category');
        }

        if (count($filter)) {
            $list = $list->filter($filter);
        }

        return $list;
    }

    /**
     * Extend nested loadable by adding additional filter option (category)
     */
    public static function loadable(DataList $list, HTTPRequest $request, $data, $config): DataList
    {
        $list = parent::loadable($list, $request, $data, $config);

        if ($data && !empty($data))
        {
            $filter = [];

            if (isset($data['urlparams']['category']) && $data['urlparams']['category']) {

                $filter['Categories.URLSegment'] = $data['urlparams']['category'];
            }

            if (count($filter)) {
                $list = $list->filter($filter);
            }
        }

        return $list;
    }
}
