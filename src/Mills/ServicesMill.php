<?php

namespace Goldfinch\Component\Services\Mills;

use Goldfinch\Mill\Mill;

class ServicesMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
            'Content' => $this->faker->paragraph(20),
        ];
    }
}
