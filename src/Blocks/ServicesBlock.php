<?php

namespace Goldfinch\Component\Services\Blocks;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Services\Models\Nest\ServiceItem;
use Goldfinch\Component\Services\Models\Nest\ServiceCategory;

class ServicesBlock extends BaseElement
{
    use FielderTrait, Millable;

    private static $table_name = 'ServicesBlock';
    private static $singular_name = 'Services';
    private static $plural_name = 'Services';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-block-bookmark';

    public function fielder(Fielder $fielder): void
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
