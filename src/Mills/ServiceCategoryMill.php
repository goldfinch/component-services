<?php

namespace Goldfinch\Component\Services\Mills;

use Goldfinch\Mill\Mill;

class ServiceCategoryMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
        ];
    }
}
