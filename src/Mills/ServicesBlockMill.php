<?php

namespace Goldfinch\Component\Services\Mills;

use Goldfinch\Mill\Mill;

class ServicesBlockMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
        ];
    }
}
