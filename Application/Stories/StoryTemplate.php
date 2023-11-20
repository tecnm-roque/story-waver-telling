<?php

namespace App\Stories;

use App\Services\ChatGptService;

abstract class StoryTemplate
{
    abstract function category(): string;

    /**
     * @return string[]
     */
    abstract function options(): array;

    abstract function process(): void;

}
