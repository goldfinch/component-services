<?php

namespace Goldfinch\Component\Services\Blocks;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Services\Models\Nest\ServiceItem;
use Goldfinch\Component\Services\Models\Nest\ServiceCategory;

class ServicesBlock extends BaseElement
{
    use HarvestTrait;

    private static $table_name = 'ServicesBlock';
    private static $singular_name = 'Services';
    private static $plural_name = 'Services';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-block-bookmark';

    public function harvest(Harvest $harvest): void
    {
        // ..
    }

    public function Items()
    {
        return ServiceItem::get();
    }

    public function Categories()
    {
        return ServiceCategory::get();
    }

    public function getSummary()
    {
        return $this->getDescription();
    }

    public function getType()
    {
        $default = $this->i18n_singular_name() ?: 'Block';

        return _t(__CLASS__ . '.BlockType', $default);
    }
}
