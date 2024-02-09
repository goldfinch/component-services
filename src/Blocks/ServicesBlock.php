<?php

namespace Goldfinch\Component\Services\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Services\Models\Nest\ServiceItem;
use Goldfinch\Component\Services\Models\Nest\ServiceCategory;

class ServicesBlock extends BaseElement
{
    private static $table_name = 'ServicesBlock';
    private static $singular_name = 'Services';
    private static $plural_name = 'Services';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = 'Services block handler';
    private static $icon = 'font-icon-block-bookmark';

    public function Items()
    {
        return ServiceItem::get();
    }

    public function Categories()
    {
        return ServiceCategory::get();
    }
}
