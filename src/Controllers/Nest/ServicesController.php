<?php

namespace Goldfinch\Component\Services\Controllers\Nest;

use Goldfinch\Nest\Controllers\NestController;
use Goldfinch\Component\Services\Configs\ServiceConfig;

class ServicesController extends NestController
{
    public function NestedList()
    {
        if ($this->NestedObject) {
            $cfg = $this->NestedObject::config();
            $cfgDB = ServiceConfig::current_config();
            if ($cfgDB->ItemsPerPage) {
                $cfg->set('nestedListPageLength', $cfgDB->ItemsPerPage);
            }
        }

        return parent::NestedList();
    }
}
