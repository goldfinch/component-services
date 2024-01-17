<?php

namespace Goldfinch\Component\Services\Admin;

use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use Goldfinch\Component\Services\Blocks\ServicesBlock;
use Goldfinch\Component\Services\Configs\ServiceConfig;
use Goldfinch\Component\Services\Models\Nest\ServiceItem;
use Goldfinch\Component\Services\Models\Nest\ServiceCategory;

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
}
