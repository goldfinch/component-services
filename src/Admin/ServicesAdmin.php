<?php

namespace Goldfinch\Component\Services\Admin;

use Goldfinch\Component\Services\Models\Nest\ServiceItem;
use Goldfinch\Component\Services\Blocks\ServicesBlock;
use Goldfinch\Component\Services\Configs\ServiceConfig;
use Goldfinch\Component\Services\Models\Nest\ServiceCategory;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;

class ServicesAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'services';
    private static $menu_title = 'Services';
    private static $menu_icon_class = 'font-icon-block-bookmark';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        ServiceItem::class => [
            'title'=> 'Services',
        ],
        ServiceCategory::class => [
            'title'=> 'Categories',
        ],
        ServicesBlock::class => [
            'title'=> 'Blocks',
        ],
        ServiceConfig::class => [
            'title'=> 'Settings',
        ],
    ];

    // public $showImportForm = true;
    // public $showSearchForm = true;
    // private static $page_length = 30;

    public function getList()
    {
        $list = parent::getList();

        // ..

        return $list;
    }

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        // ..

        return $config;
    }

    public function getSearchContext()
    {
        $context = parent::getSearchContext();

        // ..

        return $context;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // ..

        return $form;
    }

    // public function getExportFields()
    // {
    //     return [
    //         // 'Name' => 'Name',
    //         // 'Category.Title' => 'Category'
    //     ];
    // }
}
