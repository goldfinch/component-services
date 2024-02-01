<?php

namespace Goldfinch\Component\Services\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Blocks\Pages\Blocks;
use Goldfinch\Component\Services\Pages\Nest\Services;
use Goldfinch\Component\Services\Blocks\ServicesBlock;
use Goldfinch\Component\Services\Models\Nest\ServiceItem;
use Goldfinch\Component\Services\Models\Nest\ServiceCategory;
use Goldfinch\Component\Services\Pages\Nest\ServicesByCategory;

class ServicesHarvest extends Harvest
{
    public static function run(): void
    {
        $servicesPage = Services::mill(1)->make([
            'Title' => 'Services',
            'Content' => '',
        ])->first();

        ServicesByCategory::mill(1)->make([
            'Title' => 'Services by category',
            'Content' => '',
            'ParentID' => $servicesPage->ID,
        ]);

        ServiceCategory::mill(5)->make();

        ServiceItem::mill(30)->make()->each(function($item) {
            $categories = ServiceCategory::get()->shuffle()->limit(rand(0,4));

            foreach ($categories as $category) {
                $item->Categories()->add($category);
            }
        });

        // add one block to Blocks demo page (if it's exists)
        if (class_exists(Blocks::class)) {
            $demoBlocks = Blocks::get()->filter('Title', 'Blocks')->first();

            if ($demoBlocks && $demoBlocks->exists() && $demoBlocks->ElementalArea()->exists()) {
                ServicesBlock::mill(1)->make([
                    'ClassName' => $demoBlocks->ClassName,
                    'TopPageID' => $demoBlocks->ID,
                    'ParentID' => $demoBlocks->ElementalArea()->ID,
                    'Title' => 'Services',
                ]);
            }
        }
    }
}
